<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class kategoribarangType extends BaseType
{
    protected $attributes = [
        'name' => 'kategoribarangType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::Int()
            ],
            'id_barang' => [
                'type' => Type::Int()
            ],
               
            'id_kategori' => [
                'type' => Type::Int()
            ],
                      
            'kategori_nama' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('kategoriType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id_kategori'])) {
                        return  $root->kategori->where('id', $args['id_kategori']);
                    }

                    return $root->kategori;
                }
            ],
        ];
    }
}
