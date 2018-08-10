<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class statusPengirimanType extends BaseType
{
    protected $attributes = [
        'name' => 'statusPengirimanType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'status'=>[
                'type'=> Type::string()
                
            ],
            'id' => [
                'type' => (Type::Int())
            ],
            
            'tanggal' => [
                'type' => Type::string()
            ],
            'lokasi' => [
                'type' => Type::string()
            ],
            'id_pengiriman'=>[
                'type'=> Type::Int()
            ],
            'pengiriman' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('pengirimanType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->pengiriman->where('id_pengiriman', $args['id']);
                    }

                    return $root->pengiriman;
                }
            ],
        ];
    }
}
