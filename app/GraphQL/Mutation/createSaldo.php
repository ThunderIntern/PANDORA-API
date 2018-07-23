<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Saldo;
class createSaldo extends Mutation
{
    protected $attributes = [
        'name' => 'createSaldo',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('saldoType');
      }

    public function args()
    {
        return [
            'tanggal' => [ 'type' => Type::nonNull(Type::string())],
            'keterangan'  => [ 'type' => Type::nonNull(Type::string())],
            'jumlah'  => [ 'type' => Type::nonNull(Type::Int())],
            'id_wallet'  => [ 'type' => Type::nonNull(Type::Int())],
          
          
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $saldo = new Saldo();
        $saldo->fill($args);
        $saldo->save();
        return $saldo;
    }
}
