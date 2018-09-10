<?php

namespace App\GraphQL\Mutation\walet\wallet;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Wallet;
use App\Providers\Models\User;
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
            'username' => [ 'type' => (Type::string())],
            'nomer_rekening'  => [ 'type' =>(Type::string())],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {   $iduser=User::where('username',$args['username'])->first();
        $wallet = new Wallet();
        $wallet->id_user=$iduser->id;
        $wallet->nomer_rekening=$args['nomer_rekening'];

        $wallet->save();
        return $wallet;
    }
}
