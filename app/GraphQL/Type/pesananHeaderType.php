<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class pesananHeaderType extends BaseType
{
    protected $attributes = [
        'name' => 'pesananHeaderType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'nomor'=>[
                'type'=> Type::string()
                
            ],
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            
            'total' => [
                'type' => Type::Int()
            ],
           
            'ongkos_kirim'=>[
                'type'=> Type::Int()
            ],
            'tanggal'=>[
                'type'=> Type::string()
            ],
            'status' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('statusType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->status->where('id_pesanan_header', $args['id']);
                    }

                    return $root->status;
                }
            ],
            'pesananDetail' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('pesananDetailType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->pesananDetail->where('id_pesanan_header', $args['id']);
                    }

                    return $root->pesananDetail;
                }
            ],
            'pengiriman' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' =>(GraphQL::type('pengirimanType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->pengiriman->where('id_pesanan_header', $args['id']);
                    }

                    return $root->pengiriman;
                }
            ],
        ];
    }
}
