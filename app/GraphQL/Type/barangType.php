<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class barangType extends BaseType
{
    protected $attributes = [
        'name' => 'barangType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
               
            'nama' => [
                'type' => Type::string()
            ],
            'sku'=>[
                'type'=> Type::string()
            ],
            'deskripsi'=>[
                'type'=> Type::string()
            ],
           
            
            'stokDetail' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('stokDetailType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->stokDetail->where('id_barang', $args['id']);
                    }

                    return $root->stokDetail;
                }
            ]
        ];
    }
}
