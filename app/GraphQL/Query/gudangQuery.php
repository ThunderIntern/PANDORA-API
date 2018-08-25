<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Gudang;

class gudangQuery extends Query
{
    protected $attributes = [
        'name' => 'gudangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return  Type::ListOf(GraphQL::type('gudangType'));
  
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            
            'nama' => ['name' => 'nama', 'type' => Type::string()],
            'alamat' => ['name' => 'alamat', 'type' => Type::string()],
            
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
        if (isset($args['id'])) {
            $gudang= Gudang::where('id' , $args['id'])->first();
            //  $alamat=$gudang->alamat;
            //  $gudang->setAlamatEncode($alamat);
        
            return $gudang;
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            $gudang= Gudang::all();
            
            return  $gudang;
        }
    }
}
