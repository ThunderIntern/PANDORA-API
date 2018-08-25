<?php

namespace App\GraphQL\Mutation\walet\wallet;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Wallet;
class createWallet extends Mutation
{
    protected $attributes = [
        'name' => 'createWallet',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('walletType'));
    }

    public function args()
    {
        return [
            'id_user' => [ 'type' => (Type::string())],
            'nomer_rekening'  => [ 'type' =>(Type::string())],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $wallet = new Wallet();
        $wallet->fill($args);
        $wallet->save();
        return $wallet;
    }
}
