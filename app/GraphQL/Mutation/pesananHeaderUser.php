<?php

namespace App\GraphQL\Mutation;

use App\Events\onHoldEvent;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\PesananHeader as ph;
use App\PesananDetail as pd;
use App\Status as s;
use App\Pricing as p;
use App\Pengiriman ;
use App\Providers\Models\User;

class pesananHeaderUser extends Mutation
{
    protected $attributes = [
        'name' => 'CreatePesananHeader',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pesananHeaderType');
    }

    public function args()
    {
        return [
            'id_barang' => ['name' => 'id_barang', 'type' => Type::int()],
            'nama_penerima' => ['name' => 'nama_penerima', 'type' => Type::string()],
            'biodata_penerima' => ['name' => 'biodata_penerima', 'type' => GraphQL::type('IAlamat')],
            'jumlah_barang' => ['name' => 'jumlah_barang', 'type' => Type::Int()],
            'id_user' => ['name' => 'id_user', 'type' => Type::string()],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {  
       //begin transaksi dan inisiasi 
        DB::beginTransaction();
        $PesananHeader = new ph();
        $pesananDetail=new pd();
        $status=new s();
        $pengiriman =new pengiriman();
        
        //cekbar
         $cekbar=Barang::select('sku')->where('id',$args['id_barang'])->first();
      
        //cek harga barang
        $hargaBarang=p::where('sku_barang','=',$cekbar->sku)->first();    
        //cek user
        $iduser=User::where('username',$args['id_user'])->first();

        //inisiasi variabel untuk generate nomor 
        $dt=date('Y.dm.');
        $cek=count(ph::where('nomor','LIKE', $dt.'%')->get());
        $number= str_pad($cek+1, 4, '0', STR_PAD_LEFT);
        $nomor=$dt."S".$number;
        $dates=date('Y-m-d H:i:s');
        //1.buat pesanan header
        $PesananHeader->tanggal=$dates;
        $PesananHeader->nomor=$nomor;
        $PesananHeader->id_user=$iduser->id;
        $PesananHeader->ongkos_kirim=200000;
        $PesananHeader->save();
        
        //2.buat pesanan detail
        $pesananDetail->id_pesanan_header=$PesananHeader->id;     
       $pesananDetail->sku = $cekbar->sku;
   
        $pesananDetail->jumlah_barang=$args['jumlah_barang'];
        $pesananDetail->harga=$hargaBarang->harga;
        $pesananDetail->harga_promo=$hargaBarang->harga_promo;
        $pesananDetail->save();

        //3.buat status
        $status->id_pesanan_header=$PesananHeader->id;
        $status->status="Ordering";
        $status->tanggal=$dates;
        $status->save();
        
        //cek pesanan header
        $barang=pd::where('id_pesanan_header','=', $PesananHeader->id)->first();
       
        
        //alur memasukkan harga
        if($pesananDetail->harga_promo != 0){
            
            $harga=$barang->harga_promo;
            $jumlah=$barang->jumlah_barang;
            $ongkir=$PesananHeader->ongkos_kirim;
            $PesananHeader->total=($harga*$jumlah)+$ongkir;
            
        }else{
                $harga=$barang->harga;
                $jumlah=$barang->jumlah_barang;
                $ongkir=$PesananHeader->ongkos_kirim;
                $PesananHeader->total=($harga*$jumlah)+$ongkir;
            }
            
            //4.membuat pengiriman
            $pengiriman->nama_penerima=$args['nama_penerima'];
            $pengiriman->biodata_penerima=$args['biodata_penerima'];
         
            $pengiriman->id_pesanan_header=$PesananHeader->id;
            $pengiriman->save();
      
            
            //menjalankan event potong saldo
            $PesananHeader->save();
            
            $idph=$PesananHeader->id;
         
            $event = event(new onHoldEvent($idph));
              if($event==true){
                $PesananHeader->save(); 
                $pesananDetail->save();
                $status->save();
             
                DB::Commit();
          
               
                return $PesananHeader;

             }else{
                DB::Rollback();
                
                }
            
           
    }
}
