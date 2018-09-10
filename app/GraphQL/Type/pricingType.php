<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class pricingType extends BaseType
{
    protected $attributes = [
        'name' => 'pricingType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
               
            'sku_barang' => [
                'type' => Type::string()
            ],
            'tanggal'=>[
                'type'=> Type::string()
            ],
            'harga' => [
                'type' => Type::Int()
            ],
            'harga_promo' => [
                'type' => Type::Int()
            ],
            'barang' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('barangType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['sku_barang'])) {
                        return  $root->barang->where('sku', $args['sku_barang']);
                    }

                    return $root->barang;
                }
            ],
        ];          
          
    }}

