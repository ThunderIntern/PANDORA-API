<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class imageType extends BaseType
{
    protected $attributes = [
        'name' => 'imageType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
               
            'thumbnail' => [
                'type' => Type::string()
            ],
            'image_ori'=>[
                'type'=> Type::string()
            ],
            'id_barang'=>[
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
        ];
    }
}
