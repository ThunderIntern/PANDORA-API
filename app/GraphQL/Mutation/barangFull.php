<?php

namespace App\GraphQL\Mutation;
use Illuminate\Support\Facades\DB;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang as b;
use App\Image as i;
use App\Pricing as p;
use App\Kategori as k;
use App\KategoriBarang as kb;

class barangFull extends Mutation
{
    protected $attributes = [
        'name' => 'barangFull',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('barangType'));  
    }

    public function args()
    {
        return [
           
         
            'nama_barang' => [
                'type' => Type::nonNull(Type::string())
            ],
            'sku'=>[
                'type'=>Type::nonNull(Type::string())
            ],
            'deskripsi'=>[
                'type'=> Type::string()
            ],
            'dimensi'=>[
                'type'=> (GraphQL::type('IDimensi'))
            ],
            'berat'=>[
                'type'=> Type::Int()
            ],
            'harga'=>[
                'type'=> Type::Int()
            ],
            'harga_promo'=>[
                'type'=> Type::Int()
            ],
            'thumbnail'=>[
                'type'=> Type::string()
            ],
            'image_ori'=>[
                'type'=> Type::string()
            ],
            'kategori'=>[
                'type'=> Type::string()
            ],
        
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        DB::BeginTransaction();
        $barang = new b();
        $image=new i();
        $pricing=new p();
        $kategori=k::where('nama','like',$args['kategori'].'%')->first();
        $kategorib=new kb();

         $dates=date('Y-m-d H:i:s');
        $barang->nama=$args['nama_barang'];
        $barang->sku=$args['sku'];
        $barang->deskripsi=$args['deskripsi'];
        $barang->dimensi=$args['dimensi'];
        $barang->berat=$args['berat'];
        $barang->save();

        $image->thumbnail=$args['thumbnail'];
        $image->image_ori=$args['image_ori'];
        $image->id_barang=$barang->id;
        $image->save();

        $pricing->sku_barang=$args['sku'];
        $pricing->tanggal=$dates;
        $pricing->harga=$args['harga'];
        $pricing->harga_promo=$args['harga_promo'];
        $pricing->save();



        $kategorib->id_barang=$barang->id;
        $kategorib->id_kategori=$kategori->id;
        $kategorib->save();
        DB::Commit();
        return $barang;
    }
}
