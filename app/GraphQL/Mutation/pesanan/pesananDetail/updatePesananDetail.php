<?php

namespace App\GraphQL\Mutation\pesanan\pesananDetail;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\PesananDetail;
class updatePesananDetail extends Mutation
{
    protected $attributes = [
        'name' => 'UpdatePesananDetail',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pesananDetailType');
   }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::Int()
            ],
            'sku' => [
                'type' => Type::string()
            ],
            'jumlah_barang' => [
                'type' => Type::Int()
            ],
            'harga' => [
                'type' => Type::Int()
            ],
            'harga_promo' => [
                'type' => Type::Int()
            ],
            'id_pesanan_header' => [
                'type' => Type::Int()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $PesananDetail = PesananDetail::where('id', $args['id'])->first();
        
        $args['sku']? $PesananDetail->sku = $args['sku']: '';
        $args['jumlah_barang']? $PesananDetail->jumlah_barang = $args['jumlah_barang']: '';
       
        $args['harga']? $PesananDetail->harga = $args['harga']: '';
        $args['harga_promo']? $PesananDetail->harga_promo = $args['harga_promo']: '';
        $args['id_pesanan_header']? $PesananDetail->id_pesanan_header = $args['id_pesanan_header']: '';
       
        $PesananDetail->save();
        return $PesananDetail;
    }
}
