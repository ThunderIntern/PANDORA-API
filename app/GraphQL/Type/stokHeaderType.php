<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class stokHeaderType extends BaseType
{
    protected $attributes = [
        'name' => 'stokHeaderType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'id_gudang' => [
                'type' =>(Type::Int())
            ],
               
            'nomor' => [
                'type' => Type::string()
            ],
            'jenis'=>[
                'type'=> Type::string()
            ],
            'tanggal'=>[
                'type'=> Type::string()
            ],
                         
            'gudang' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' =>(GraphQL::type('gudangType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->gudang->where('id_gudang', $args['id']);
                    }

                    return $root->gudang;
                }
            ],
            'stokDetail' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' =>   Type::listOf(GraphQL::type('stokDetailType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->stokDetail->where('id_stok_header', $args['id']);
                    }

                    return $root->stokDetail;
                }   
            ]
        ];
    }
}
