<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokDetail;
class updateStokDetail extends Mutation
{
    protected $attributes = [
        'name' => 'updateStokDetail',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('stokDetailType'));
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'id_barang' => [
                'type' =>(Type::Int())
            ],
            'id_stok_header' => [
                'type' =>(Type::Int())
            ],
               
            'satuan' => [
                'type' => Type::string()
            ],
            'kuantitas'=>[
                'type'=> Type::Int()
            ],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $StokDetail = StokDetail::where('id', $args['id'])->first();
        $args['id_stok_header']? $StokDetail->id_stok_header = $args['id_stok_header']: '';
        $args['id_barang']? $StokDetail->id_barang = $args['id_barang']: '';
        $args['kuantitas']? $StokDetail->kuantitas = $args['kuantitas']: '';
        $args['satuan']? $StokDetail->satuan = $args['satuan']: '';
        $StokDetail->save();
        return $StokDetail;
    }
}
