<?php

namespace App\GraphQL\Mutation\walet\saldo;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Saldo;
use App\Wallet;
use App\Providers\Models\User;
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
            // 'tanggal' => [ 'type' => Type::nonNull(Type::string())],
            'keterangan'  => [ 'type' => Type::nonNull(Type::string())],
            'jumlah'  => [ 'type' => Type::nonNull(Type::Int())],
            'username'  => [ 'type' => (Type::string())],
            
          
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {   $iduser=User::where('username',$args['username'])->first();
        $idwallet=Wallet::where('id_user',$iduser->id)->first();
        $jumlah=Saldo::select('jumlah')->where('id_wallet',$idwallet->id)->get();
       
        $cekSaldo=$jumlah->sum('jumlah');

        $dates=date('Y-m-d H:i:s');
        $saldo = new Saldo();
        $saldo->tanggal=$dates;
        $saldo->keterangan=$args['keterangan'];
        $saldo->jumlah=$args['jumlah'];
        
        $saldo->id_wallet=$idwallet->id;
        $saldo->save();
        return $saldo;
    }
}
