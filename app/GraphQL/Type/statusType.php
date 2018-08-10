<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class statusType extends BaseType
{
    protected $attributes = [
        'name' => 'statusType',
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
           
            'id_pesanan_header'=>[
                'type'=> Type::Int()
            ],
            'pesananHeader' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('pesananHeaderType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->pesananHeader->where('id_pesanan_header', $args['id']);
                    }

                    return $root->pesananHeader;
                }
            ],
        ];
    }
}
