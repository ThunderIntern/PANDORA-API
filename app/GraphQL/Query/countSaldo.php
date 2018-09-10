<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Saldo;
class countSaldo extends Query
{
    protected $attributes = [
        'name' => 'countSaldo',
        'description' => 'A query'
    ];

    public function type()
    {
        return (GraphQL::type('countBarangType'));
    }

    public function args()
    {
        return [
            'jumlah' => ['name' => 'jumlah', 'type' => Type::Int()],
        ];
    }   

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $jumlah= Saldo::select('id','tanggal','id_wallet','jumlah','keterangan','onHold')->count();

         return ['jumlah' => $jumlah];
        }
        
}
