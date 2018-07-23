<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class walletType extends BaseType
{
    protected $attributes = [
        'name' => 'walletType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
               
            'user_id' => [
                'type' => Type::string()
            ],
            'nomer_rekening'=>[
                'type'=> Type::string()
            ],
                         
            'saldo' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' =>    Type::listOf(GraphQL::type('saldoType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->saldo->where('id_wallet', $args['id']);
                    }

                    return $root->saldo;
                }
            ]
        ];
    }
}
