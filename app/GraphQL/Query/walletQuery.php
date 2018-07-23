<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Wallet;
class walletQuery extends Query
{
    protected $attributes = [
        'name' => 'walletQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('walletType'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'user_id' => ['name' => 'user_id', 'type' => Type::string()],
            'nomer_rekening' => ['name' => 'nomer_rekening', 'type' => Type::string()],
            
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return Wallet::where('id' , $args['id'])->get();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            return Wallet::all();
        }
    }
}
