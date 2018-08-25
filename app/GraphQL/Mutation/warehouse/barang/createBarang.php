<?php

namespace App\GraphQL\Mutation\warehouse\barang;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang;
class createBarang extends Mutation
{
    protected $attributes = [
        'name' => 'createBarang',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('barangType');  }

    public function args()
    {
        return [
          
            'nama' => [
                'type' => Type::nonNull(Type::string())
            ],
            'sku'=>[
                'type'=>Type::nonNull(Type::string())
            ],
            'deskripsi'=>[
                'type'=> Type::string()
            ],
            'berat' => ['name' => 'berat', 'type' => Type::Int()],
            'dimensi' => ['type' => GraphQL::type('IDimensi')],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $barang = new Barang();
        $barang->nama=$args['nama'];
        $barang->sku=$args['sku'];
        $barang->deskripsi=$args['deskripsi'];
        $barang->berat=$args['berat'];
        $barang->dimensi=$args['dimensi'];
        

        $barang->save();
        return $barang;
    }
}
