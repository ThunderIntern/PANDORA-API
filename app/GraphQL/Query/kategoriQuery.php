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
            'kategori' => [ 'type' => Type::string()],
         
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return Kategori::where('id' , $args['id'])->first();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            return Kategori::all();
        }
    }
}
