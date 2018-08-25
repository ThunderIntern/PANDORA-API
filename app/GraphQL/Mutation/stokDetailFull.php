<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokHeader as sh;
use App\StokDetail as sd;
use App\Barang as b;
use App\Image as i;
use App\Pricing as p;
class stokDetailFull extends Mutation
{
    protected $attributes = [
        'name' => 'stokDetailFull',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('stokDetailType');
   
    }

    public function args()
    {
        return [
            'id_stok_header'=>['type'=>Type::nonNull(Type::Int())],
            'kuantitas'=>['type'=>Type::nonNull(Type::Int())],
            'satuan'=>['type'=>Type::nonNull(Type::string())],
            'nama_barang' => [
                'type' => Type::nonNull(Type::string())
            ],
            'sku'=>[
                'type'=>Type::nonNull(Type::string())
            ],
            'deskripsi'=>[
                'type'=> Type::string()
            ],
            'berat' => ['name' => 'berat', 'type' => Type::Int()],
            'dimensi' => ['name' => 'dimensi', 'type' => Type::string()],
            'harga' => ['name' => 'harga', 'type' => Type::Int()],
            'harga_promo' => ['name' => 'harga_promo', 'type' => Type::Int()],
            'thumbnail'=>['type'=>Type::nonNull(Type::string())],
            'image_ori'=>['type'=>Type::nonNull(Type::string())],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        DB::beginTransaction();
        $stokHeader=new sh();
        $stokDetail = new sd();
        $barang = new b();
        $image =new i();
        $pricing=new p();
        
        $cekSh=sh::where('id','=', $args['id_stok_header'])->first();
       

        $barang->nama=$args['nama_barang'];
        $barang->sku=$args['sku'];
        $barang->deskripsi=$args['deskripsi'];
        $barang->dimensi=$args['dimensi'];
        $barang->save();
        $barang->berat=$args['berat'];
       //$barang->setDimensiDecode('dimensi');
       $barang->save();

        $image->id_barang=$barang->id;
        $image->thumbnail=$args['thumbnail'];
        $image->image_ori=$args['image_ori'];
        $image->save();

        $pricing->sku_barang=$args['sku'];
        $pricing->harga=$args['harga'];
        $pricing->harga_promo=$args['harga_promo'];
       
        $pricing->save();

        $stokDetail->id_stok_header=$args['id_stok_header'];
        $stokDetail->satuan=$args['satuan'];
        $stokDetail->kuantitas=$args['kuantitas'];
        $stokDetail->id_barang=$barang->id;
        $stokDetail->save();

        DB::Commit();
        return $stokDetail;
    }
}
