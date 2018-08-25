<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class kategoribarangType extends BaseType
{
    protected $attributes = [
        'name' => 'kategoribarangType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id_barang' => [
                'type' => Type::Int()
            ],
               
            'id_kategori' => [
                'type' => Type::Int()
            ],
                      
           
        ];
    }
}
