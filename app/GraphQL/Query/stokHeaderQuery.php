<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokHeader;
class stokHeaderQuery extends Query
{
    protected $attributes = [
        'name' => 'stokHeaderQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('stokHeaderType'));
  
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'id_gudang' => ['name' => 'id_gudang', 'type' => Type::Int()],
            
            'nomor' => ['name' => 'nomor', 'type' => Type::string()],
            'jenis' => ['name' => 'jenis', 'type' => Type::string()],
            'tanggal' => ['name' => 'tanggal', 'type' => Type::string()],
            
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return StokHeader::where('id' , $args['id'])->get();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            return StokHeader::all();
        }
    }
}
