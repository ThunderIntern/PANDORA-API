<?php

namespace App\GraphQL\Mutation\pesanan\pesananDetail;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class createPesananDetail extends Mutation
{
    protected $attributes = [
        'name' => 'CreatePesananDetail',
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
          
            'id_pesanan_header' => [
                'type' => Type::Int()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $PesananDetail = new PesananDetail();
        $PesananDetail->fill($args);
        $PesananDetail->save();
        return $PesananDetail;
    }
}
