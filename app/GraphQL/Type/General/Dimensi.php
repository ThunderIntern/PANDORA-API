<?php

namespace App\GraphQL\Type\General;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Dimensi extends BaseType
{
    protected $attributes = [
        'name' => 'Dimensi',
        'description' => 'General fetch dimensi'
    ];

    public function fields()
    {
        return [
            'panjang' => [
                'type' => Type::string()
            ],
            'lebar' => [
                'type' => Type::string()
            ], 
            'tinggi' => [
                'type' => Type::string()
            ],
           
        ];
    }
}
