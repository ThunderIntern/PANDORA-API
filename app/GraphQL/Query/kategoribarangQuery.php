<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\KategoriBarang;
class kategoribarangQuery extends Query
{
    protected $attributes = [
        'name' => 'kategoribarangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('kategoribarangType'));
      
    }

    public function args()
    {
        return [
            'id_kategori' => [ 'type' => Type::Int()],
            'id_barang' => [ 'type' => Type::Int()],
         
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        // if (isset($args['id'])) {
        //     return KategoriBarang::where('id' , $args['id'])->first();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        // }else {
            return KategoriBarang::all();
        // }
    }
}
