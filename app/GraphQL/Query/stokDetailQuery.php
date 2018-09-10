<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokDetail;
class stokDetailQuery extends Query
{
    protected $attributes = [
        'name' => 'stokDetailQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('stokDetailType'));
  
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'id_barang' => ['name' => 'id_barang', 'type' => Type::Int()],
            'id_stok_header' => ['name' => 'id_stok_header', 'type' => Type::Int()],
           
            'satuan' => ['name' => 'satuan', 'type' => Type::string()],
            'kuantitas' => ['name' => 'kuantitas', 'type' => Type::Int()],
            
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id_stok_header'])) {
            return StokDetail::where('id_stok_header' , $args['id_stok_header'])->get();
        //  } else if(isset($args['id'])) {
        //     return StokDetail::where('id', $args['id'])->get();
        // // }
        // else if(isset($args['username'])) {
        //     return User::where('username', $args['username'])->get(); 
        // }else if(isset($args['password'])) {
        //     return User::where('password', $args['password'])->get(); 
           
        }else {
            return StokDetail::all();
        }
    }
}
