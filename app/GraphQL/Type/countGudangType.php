<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class countGudangType extends BaseType
{
    protected $attributes = [
        'name' => 'countGudangType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'jumlah' => ['name' => 'jumlah', 'type' => Type::Int()],
            'nama'		=> 	[
                'name' 	=> 'nama', 		
                'type' 	=> Type::string(),
                'rules' => ['nullable', 'string'],
            ],
        ];
    }
}
