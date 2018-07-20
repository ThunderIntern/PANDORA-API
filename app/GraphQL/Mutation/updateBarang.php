<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang;
class updateBarang extends Mutation
{
    protected $attributes = [
        'name' => 'updateBarang',
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
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $barang = Barang::where('id', $args['id'])->first();
        
            $args['nama']? $barang->nama = $args['nama']: '';
            $args['sku']? $barang->sku = $args['sku']: '';
            $args['deskripsi']? $barang->deskripsi = $args['deskripsi']: '';
            $barang->save();
            return $barang;
    }
}