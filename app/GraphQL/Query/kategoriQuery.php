<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Kategori;
class kategoriQuery extends Query
{
    protected $attributes = [
        'name' => 'kategoriQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('kategoriType'));
      
    }

    public function args()
    {
return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'nama' => [ 'type' => Type::string()],
            'jenis' => [ 'type' => Type::string()],
        
             
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
            return Kategori::where('jenis','kategori')->get();
        }
    }

