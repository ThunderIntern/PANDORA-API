<?php

namespace App\GraphQL\Type\General;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Alamat extends BaseType
{
    protected $attributes = [
        'name' => 'Alamat',
        'description' => 'General fetch alamat'
    ];

    public function fields()
    {
        return [
            'jalan' => [
                'type' => Type::string()
            ],
            'kecamatan' => [
                'type' => Type::string()
            ], 
            'kelurahan' => [
                'type' => Type::string()
            ],
            'kota' => [
                'type' => Type::string()
            ],
            'kodepos' => [
                'type' => Type::string()
            ],
            'no_telp' => [
                'type' => Type::string()
            ],
        ];
    }
}
