<?php

namespace App\GraphQL\Mutation\warehouse\barang;

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
            'berat' => ['name' => 'berat', 'type' => Type::Int()],
            'dimensi' => ['type' => GraphQL::type('IDimensi')],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $barang = Barang::where('id', $args['id'])->first();
        
            $args['nama']? $barang->nama = $args['nama']: '';
            $args['sku']? $barang->sku = $args['sku']: '';
            $args['deskripsi']? $barang->deskripsi = $args['deskripsi']: '';
            $args['berat']? $barang->berat = $args['berat']: '';
     
       $args['dimensi']? $barang->dimensi = $args['dimensi']: '';
            $barang->save();
            return $barang;
    }
}