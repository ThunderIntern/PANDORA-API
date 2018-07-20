<?php

namespace App\GraphQL\Mutation;

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
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $barang = new Barang();
        $barang->fill($args);
        $barang->save();
        return $barang;
    }
}
