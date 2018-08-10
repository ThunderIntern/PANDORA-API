<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StatusPengiriman;
class statusPengirimanQuery extends Query
{
    protected $attributes = [
        'name' => 'statusPengirimanQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('statusPengirimanType'));
  
    }

    public function args()
    {
        return [
            'status'=>[
                'type'=> Type::string()
                
            ],
            'id' => [
                'type' => (Type::Int())
            ],
            
            'tanggal' => [
                'type' => Type::string()
            ],
            'lokasi' => [
                'type' => Type::string()
            ],
            'id_pengiriman'=>[
                'type'=> Type::Int()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return StatusPengiriman::where('id' , $args['id'])->get();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            return StatusPengiriman::all();
        }
    }
}
