<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\PesananDetail;
class pesananDetailQuery extends Query
{
    protected $attributes = [
        'name' => 'pesananDetailQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('pesananDetailType'));
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::Int()
            ],
            'sku' => [
                'type' => Type::string()
            ],
            'jumlah_barang' => [
                'type' => Type::Int()
            ],
            'harga' => [
                'type' => Type::Int()
            ],
            'harga_promo' => [
                'type' => Type::Int()
            ],
            'id_pesanan_header' => [
                'type' => Type::Int()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return PesananDetail::where('id' , $args['id'])->get();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
            return PesananDetail::all();
        }
    }
}
