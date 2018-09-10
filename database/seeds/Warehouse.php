<?php

use Illuminate\Database\Seeder;
use App\Gudang as g;
use App\StokHeader as sh;
use App\StokDetail as sd;
use App\Barang as b;
use App\Image as i;
use App\Pricing as p;
use App\Kategori as k;
use App\KategoriBarang as kb;
class Warehouse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g = g::create([
            'nama' => 'a',
            'alamat' => '{ "alamat": "jalan.sddasdsa","kelurahan":"" ,"kecamatan":"","kota":"malang","kodepos": "29132","provinsi":"jawa timur","negara":"indonesia" ,"geolocation": { "latitude":"" , "longitude": "" }}',
            ]);
            $dt=date('Y.dm.');
            $cek=count(sh::where('nomor','LIKE', $dt.'%')->get());
            $number= str_pad($cek+1, 4, '0', STR_PAD_LEFT);
            $nomor=$dt."P".$number;
        $sh = sh::create([
            'id_gudang' => $g->id,
            'tanggal' => '2018-07-18 13:44:27',
            'nomor' =>   $nomor,
            'jenis' => 'barang datang'
        ]);
        $b = b::create([
            'nama' => str_random(10),
            'sku' => str_random(3),
            'berat'=>3000,
            'dimensi'=>'{ "panjang": "20", "lebar": "25","tinggi":"10" }',
            'deskripsi' => 'adidas mantap',
        ]);
        $dates=date('Y-m-d H:i:s');
        $p = p::create([
            'sku_barang' => $b->sku,
            'harga'=>rand(100000,500000),
            'harga_promo'=>rand(100000,400000),
            
            'tanggal'=>$dates,
            
            ]);
        
            $k= k::where('nama','like','fash'.'%')->first();
            
            $t= k::where('nama','=','casual')->first();
            
            $w= k::where('nama','=','biru')->first();
            // $a= k::where('nama','=','biru')->first();
            $kb= kb::create([
                
                'id_barang'=>$b->id,
                'id_kategori'=>$k->id,
            ]);
            $kt= kb::create([
                
                'id_barang'=>$b->id,
                'id_kategori'=>$t->id,
            ]);
            $kw= kb::create([
                
                'id_barang'=>$b->id,
                'id_kategori'=>$w->id,
            ]);
            // $sw= kb::create([
                
            //     'id_barang'=>$b->id,
            //     'id_kategori'=>$a->id,
            // ]);
        $sd = sd::create([
            'id_stok_header' => $sh->id,
            'id_barang' => $b->id,
            'kuantitas' => rand(0,1),
            'satuan' => 'kg',
        ]);
     
        $i = i::create([
            
            'id_barang' => $b->id,
            'thumbnail' => 'https://image.ibb.co/bVRE0z/c_product_3.jpg',
            'image_ori' => 'https://i.imgur.com/BF9smYa.jpg',
            ]);
            // $b = b::create([
            //     'nama' => str_random(10),
            //     'sku' => str_random(3),
            //     'berat'=>rand(1000,5000),
            //     'dimensi'=>'{ "panjang":"21", "lebar": "12","tinggi":"25" }',
            //     'deskripsi' =>  str_random(10),
            // ]);
            // $dates=date('Y-m-d H:i:s');
            // $p = p::create([
            //     'sku_barang' => $b->sku,
            //     'harga'=>rand(100000,500000),
            //     'harga_promo'=>rand(100000,400000),
                
            //     'tanggal'=>$dates,
                
            //     ]);
            //      $k = k::create([
            //     'kategori' => 'pakaian',
               
                
            //     ]);
            // $kb= kb::create([
                
            //     'id_barang'=>$b->id,
            //     'id_kategori'=>$k->id,
            // ]);
    }
}
