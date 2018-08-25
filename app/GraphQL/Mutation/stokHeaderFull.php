<?php

namespace App\GraphQL\Mutation;

use Illuminate\Support\Facades\DB;
use GraphQL\Error\Error;
use Illuminate\Validation\Rule;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokHeader as sh;
use App\StokDetail as sd;
use App\Barang as b;
use App\Image as i;
use App\Pricing as p;

class stokHeaderFull extends Mutation
{
    protected $attributes = [
        'name' => 'stokHeaderFull',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('stokHeaderType');
    }

    public function args()
    {
        return [
            'jenis'  => [ 'type' => Type::nonNull(Type::string())],
            'tanggal'  => [ 'type' => Type::nonNull(Type::string())],
            'id_gudang'=>['type'=>Type::nonNull(Type::Int())],
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
        $stokHeader = new sh();
        $stokDetail = new sd();
        $barang = new b();
        $image =new i();
        $pricing=new p();

        $dt=date('Y.dm.');
        $cek=count(sh::where('nomor','LIKE', $dt.'%')->get());
        $number= str_pad($cek+1, 4, '0', STR_PAD_LEFT);
        $nomor=$dt."P".$number;
       
        $stokHeader->nomor=$nomor;
        $stokHeader->jenis=$args['jenis'];
        $stokHeader->tanggal=$args['tanggal'];
        $stokHeader->id_gudang=$args['id_gudang'];
        $stokHeader->save();

        $barang->nama=$args['nama_barang'];
        $barang->sku=$args['sku'];
        $barang->deskripsi=$args['deskripsi'];
        $barang->dimensi=$args['dimensi'];
        $barang->save();
        $barang->berat=$args['berat'];
       $barang->setDimensiDecode('dimensi');
       $barang->save();

        $image->id_barang=$barang->id;
        $image->thumbnail=$args['thumbnail'];
        $image->image_ori=$args['image_ori'];
        $image->save();

        $pricing->sku_barang=$args['sku'];
        $pricing->harga=$args['harga'];
        $pricing->harga_promo=$args['harga_promo'];
        $pricing->tanggal=$args['tanggal'];
        $pricing->save();

        $stokDetail->id_stok_header=$stokHeader->id;
        $stokDetail->satuan=$args['satuan'];
        $stokDetail->kuantitas=$args['kuantitas'];
        $stokDetail->id_barang=$barang->id;
        $stokDetail->save();

        DB::Commit();

return $stokHeader;

    }
}
