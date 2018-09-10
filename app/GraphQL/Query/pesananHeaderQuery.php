<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\PesananHeader;
class pesananHeaderQuery extends Query
{
    protected $attributes = [
        'name' => 'pesananHeaderQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('pesananHeaderType'));
  
    }

    public function args()
    {
        return [
           
            'username' => ['name' => 'username', 'type' => Type::string()],
         
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['username'])) {
            return PesananHeader::where('id_user' , $args['username'])->get();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            return PesananHeader::all();
        }
    }
}
