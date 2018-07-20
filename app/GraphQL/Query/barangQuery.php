<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang;
class barangQuery extends Query
{
    protected $attributes = [
        'name' => 'barangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('barangType'));
     }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            
            'nama' => ['name' => 'nama', 'type' => Type::string()],
            'sku' => ['name' => 'sku', 'type' => Type::string()],
            'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return Barang::where('id' , $args['id'])->get();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            return Barang::all();
        }
    }
}

