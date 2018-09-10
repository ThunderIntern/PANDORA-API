<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class stokDetailType extends BaseType
{
    protected $attributes = [
        'name' => 'stokDetailType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => (Type::Int())
            ],
            'id_barang' => [
                'type' =>(Type::Int())
            ],
            'id_stok_header' => [
                'type' =>(Type::Int())
            ],
               
            'satuan' => [
                'type' => Type::string()
            ],
            'kuantitas'=>[
                'type'=> Type::Int()
            ],
            
                         
            'barang' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('barangType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->barang->where('id_barang', $args['id']);
                    }

                    return $root->barang;
                }
            ],
            'stokHeader' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('stokHeaderType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->stokHeader->where('id_stok_header', $args['id']);
                    }

                    return $root->stokHeader;
                }
            ]
        ];
    }
}
