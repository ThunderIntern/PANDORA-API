<?php

namespace App\GraphQL\Mutation\warehouse\barang;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang;
class deleteBarang extends Mutation
{
    protected $attributes = [
        'name' => 'deleteBarang',
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
                'type' => Type::nonNull(Type::Int())
            ],
            'nama' => [
                'type' => Type::string()
            ],
            'sku' => [
                'type' => Type::string()
            ],
            'deskripsi' => [
                'type' => Type::string()
            ],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $barang = Barang::where('id', $args['id'])->first();
        $barang->delete();
        return $barang;
    }
}
