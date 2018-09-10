<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Image;
use App\Barang;
class updateBarangFull extends Mutation
{
    protected $attributes = [
        'name' => 'updateBarangFull',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('barangType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => (Type::Int())
            ],
            'nama' => [
                'type' => (Type::string())
            ],
            'sku' => [
                'type' => (Type::string())
            ],
            'deskripsi' => [    
                'type' => Type::string()
            ],
            'berat' => ['name' => 'berat', 'type' => Type::Int()],
            'dimensi' => ['type' => GraphQL::type('IDimensi')],
            'thumbnail'=>[
                'type'=> Type::string()
            ],
            'image_ori'=>[
                'type'=> Type::string()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $barang = Barang::where('id', $args['id'])->first();
        $image=Image::where('id_barang', $barang->id)->first();
            $args['nama']? $barang->nama = $args['nama']: '';
            $args['sku']? $barang->sku = $args['sku']: '';
            $args['deskripsi']? $barang->deskripsi = $args['deskripsi']: '';
            $args['berat']? $barang->berat = $args['berat']: '';
     
      $args['dimensi']? $barang->dimensi = $args['dimensi']: '';
            $barang->save();
            $args['thumbnail']? $image->thumbnail = $args['thumbnail']: '';
            $args['image_ori']? $image->image_ori = $args['image_ori']: '';
            $image->save();
            return $barang;
    }
}