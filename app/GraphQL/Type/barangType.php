<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\Barang;
class barangType extends BaseType
{
  
    protected $attributes = [
        'name' => 'barangType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'sku'=>[
                'type'=> Type::string()
                
            ],
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            
            'nama' => [
                'type' => Type::string()
            ],
           
            'deskripsi'=>[
                'type'=> Type::string()
            ],
            'pricing' => [
                'args' => [
                
                    'sku_barang'=> [
                        'type'        => Type::string(),
                        'description' => 'id pesanan',
                    ],
                    'harga' => [
                        'type'        => Type::string(),
                        'description' => 'id pesanan',
                    ],
                    'harga_promo' => [
                        'type'        => Type::string(),
                        'description' => 'id pesanan',
                    ],
                    
                ],
                'type' => (GraphQL::type('pricingType')),
                
                'resolve' => function ($root, $args) {
                     if(isset($args['sku_barang'])) {
                        return  $root->pricing->where(['sku_barang'],$args['sku_barang']);
                    }   else if(isset($args['harga'])) {
                        return  $root->pricing->where('harga', $args['harga']);
                    }   else if(isset($args['harga_promo'])) {
                        return  $root->pricing->where('harga_promo', $args['harga_promo']);
                    } 
                    return $root->pricing;
                }
            ],
          
            'stokDetail' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('stokDetailType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->stokDetail->where('id_barang', $args['id']);
                    }

                    return $root->stokDetail;
                }
            ],
            'image' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('imageType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->image->where('id_barang', $args['id']);
                    }

                    return $root->image;
                }
            ],
        ];
    }
}
