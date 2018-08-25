<?php

namespace App\GraphQL\Mutation\pesanan\pesananDetail;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\PesananDetail;
class deletePesananDetail extends Mutation
{
    protected $attributes = [
        'name' => 'DeletePesananDetail',
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
        $PesananDetail->delete();
        return $PesananDetail;
    }
}
