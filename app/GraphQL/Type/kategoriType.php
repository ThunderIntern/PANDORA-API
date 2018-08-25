<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class kategoriType extends BaseType
{
    protected $attributes = [
        'name' => 'kategoriType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
               
            'kategori' => [
                'type' => Type::string()
            ],
                      
           
        ];
    }
}
