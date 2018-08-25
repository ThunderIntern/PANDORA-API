<?php

namespace App\GraphQL\Mutation\walet\wallet;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Wallet;
class deleteWallet extends Mutation
{
    protected $attributes = [
        'name' => 'deleteWallet',
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
         
          
          'id_user'  => [ 'type' => (Type::string())],
          'nomer_rekening'  => [ 'type' => (Type::string())],
          
        
        
      ];
  }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $wallet = Wallet::where('id', $args['id'])->first();
        $wallet->delete();
        return $wallet;
    }
}
