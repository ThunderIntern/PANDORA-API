<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class pesananDetailType extends BaseType
{
    protected $attributes = [
        'name' => 'pesananDetailType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::Int()
            ],
            'sku' => [
                'type' => Type::string()
            ],
            'jumlah_barang' => [
                'type' => Type::Int()
            ],
            'harga' => [
                'type' => Type::Int()
            ],
            'harga_promo' => [
                'type' => Type::Int()
            ],
            'id_pesanan_header' => [
                'type' => Type::Int()
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
            'barang' => [
                'args' => [
                    'sku' => [
                        'type'        => Type::string(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('barangType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['sku'])) {
                        return  $root->barang->where('sku', $args['sku']);
                    }

                    return $root->barang;
                }
            ],
        ];
    }
}
