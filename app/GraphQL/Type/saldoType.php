<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class saldoType extends BaseType
{
    protected $attributes = [
        'name' => 'saldoType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'id_wallet' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'tanggal' => [
                'type' => Type::string()
            ],
            'jumlah' => [
                'type' => Type::Int()
            ],
            
            'keterangan'=>[
                'type'=> Type::string()
            ],
                         
            'wallet' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('walletType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->wallet->where('id_wallet', $args['id']);
                    }

                    return $root->wallet;
                }
            ]
        ];
    }
}
