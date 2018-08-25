<?php

namespace App\GraphQL\Type\General;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Geolocation extends BaseType
{
    protected $attributes = [
        'name' => 'Geolocation',
        'description' => 'General fetch Geolocation'
    ];

    public function fields()
    {
        return [
            'longitude' => [
                'type' => Type::string()
            ],
            'latitude' => [
                'type' => Type::string()
            ], 
           
           
        ];
    }
}
