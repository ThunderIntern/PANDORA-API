<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Saldo;
class saldoQuery extends Query
{
    protected $attributes = [
        'name' => 'saldoQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('saldoType'));
    }

    public function args()
    {
        return [

            'skip' => ['name' => 'skip', 'type' => Type::int()],
            'take' => ['name' => 'take', 'type' => Type::int()],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        // if (isset($args['id'])) {
        //     return Saldo::where('id' , $args['id'])->get();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        // }else {
            return Saldo::select('id','tanggal','id_wallet','jumlah','keterangan','onHold')->skip($args['skip'])->take($args['take'])->orderby('tanggal','desc')->get();
        // }
    }
}
