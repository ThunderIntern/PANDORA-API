<?php

namespace App\GraphQL\Mutation\walet\wallet;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Wallet;
class updateWallet extends Mutation
{
    protected $attributes = [
        'name' => 'updateWallet',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('walletType');
    }

 public function args()
 {
     return [
         'id' => [ 'type' => Type::nonNull(Type::Int())],
      
       'nomer_rekening' => [ 'type' => Type::nonNull(Type::string())],
       'id_user'  => [ 'type' => Type::nonNull(Type::string())],
      
       
     ];
 }

 public function resolve($root, $args, $context, ResolveInfo $info)
 {
     $wallet = Wallet::where('id', $args['id'])->first();
     $args['nomer_rekening']? $wallet->nomer_rekening = $args['nomer_rekening']: '';
     $args['user_id']? $wallet->user_id = $args['user_id']: '';
    
     $wallet->save();
     return $wallet;
 }
}
