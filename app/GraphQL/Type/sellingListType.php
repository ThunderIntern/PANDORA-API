<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class sellingListType extends BaseType
{
    protected $attributes = [
        'name' => 'sellingListType',
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
            'sku_barang' => [
                'type' => Type::string()
            ],
            
            'harga' => [
                'type' => Type::Int()
            ],
            
        ] ;          
          
    }}
