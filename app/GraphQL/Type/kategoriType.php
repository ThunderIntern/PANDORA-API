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
               
            'nama' => [
                'type' => Type::string()
            ],
            'jenis' => [
                'type' => Type::string()
            ],
            'id_parent'		=> 	[
                'name' 	=> 'id_parent', 
                'type' 	=> Type::Int(),
                'rules' => ['nullable', 'integer'],
            ],    
            'tag' => [
                
                
                'type' => Type::listOf(GraphQL::type('kategoriType')),
                
                'resolve' => function ($root, $args) {
                  
                return  $root->kategori;
                  

                  
                }
            ],   
           
        ];
    }
}
