<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pricing;
class pricingQuery extends Query
{
    protected $attributes = [
        'name' => 'pricingQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('pricingType'));
   
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'sku_barang' => ['name' => 'sku_barang', 'type' => Type::string()],
            'tanggal' => ['name' => 'tanggal', 'type' => Type::string()],
            'harga' => ['name' => 'harga', 'type' => Type::Int()],
            'harga_promo' => ['name' => 'harga_promo', 'type' => Type::Int()],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    { $dates=date('Y-m-d H:i:s');
        if (isset($args['id'])) {
            return Pricing::where('id' , $args['id'] ,'and','tanggal','<=',$dates)->orderBy('tanggal','desc')->first();
        /* } else if(isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }else if(isset($args['username'])) {
            return User::where('username', $args['username'])->get(); 
        }else if(isset($args['password'])) {
            return User::where('password', $args['password'])->get(); 
           */
        }else {
           
            return Pricing::orderBy('tanggal','desc')->first();
        }
    }
}
