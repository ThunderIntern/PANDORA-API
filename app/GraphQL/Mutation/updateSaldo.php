<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Saldo;
class updateSaldo extends Mutation
{
    protected $attributes = [
        'name' => 'updateSaldo',
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
         
          'tanggal' => [ 'type' => Type::nonNull(Type::string())],
          'keterangan'  => [ 'type' => Type::nonNull(Type::string())],
          'jumlah'  => [ 'type' => Type::nonNull(Type::Int())],
          'id_wallet'  => [ 'type' => Type::nonNull(Type::Int())],
        
          
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $saldo = Saldo::where('id', $args['id'])->first();
        $args['jumlah']? $saldo->jumlah = $args['jumlah']: '';
        $args['id_wallet']? $saldo->id_wallet = $args['id_wallet']: '';
        $args['tanggal']? $saldo->tanggal = $args['tanggal']: '';
        $args['keterangan']? $saldo->keterangan = $args['keterangan']: '';
       
        $saldo->save();
        return $saldo;
    }
}
