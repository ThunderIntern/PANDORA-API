<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokDetail;
class deleteStokDetail extends Mutation
{
    protected $attributes = [
        'name' => 'deleteStokDetail',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('stokDetailType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'id_stok_header' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'id_barang' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'kuantitas' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'satuan' => [
                'type' => Type::string()
            ],
            
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $stokDetail = StokDetail::where('id', $args['id'])->first();
        $stokDetail->delete();
        return $stokDetail;
    }
}
