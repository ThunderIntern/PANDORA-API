<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class gudangType extends BaseType
{
    protected $attributes = [
        'name' => 'gudangType',
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
            'alamat'=>[
                'type'=> GraphQL::type('Alamat')
            ],
                         
            'stokHeader' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('stokHeaderType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->stokHeader->where('id_gudang', $args['id']);
                    }

                    return $root->stokHeader;
                }
            ]
        ];
    }
}
