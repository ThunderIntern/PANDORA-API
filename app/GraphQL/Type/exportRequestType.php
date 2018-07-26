<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class exportRequestType extends BaseType
{
    protected $attributes = [
        'name' => 'exportRequestType',
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
                'target'=>[
                    'type'=> Type::string()
                ],
                             
                    
        ];
    }
}
