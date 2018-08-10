<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Image;
class imageQuery extends Query
{
    protected $attributes = [
        'name' => 'imageQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('imageType'));
      
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'id_barang' => ['name' => 'id_barang', 'type' => Type::Int()],
            'thumbnail' => ['name' => 'thumbnail', 'type' => Type::string()],
           
            'image_ori' => ['name' => 'image_ori', 'type' => Type::string()],
           
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return Image::where('id' , $args['id'])->get();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            return Image::all();
        }
    }
}
