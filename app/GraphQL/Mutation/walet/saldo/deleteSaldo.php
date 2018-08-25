<?php

namespace App\GraphQL\Mutation\walet\saldo;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Saldo;
class deleteSaldo extends Mutation
{
    protected $attributes = [
        'name' => 'deleteSaldo',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('saldoType');
    }

  public function args()
  {
      return [
        'id' => [ 'type' => Type::nonNull(Type::Int())],
         
          'tanggal' => [ 'type' => (Type::string())],
          'keterangan'  => [ 'type' =>(Type::string())],
          'jumlah'  => [ 'type' => (Type::Int())],
          'id_wallet'  => [ 'type' => (Type::Int())],
          'onHold'  => [ 'type' => (Type::Int())],
        
      ];
  }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $saldo = Saldo::where('id', $args['id'])->first();
        $saldo->delete();
        return $saldo;
    }
}
