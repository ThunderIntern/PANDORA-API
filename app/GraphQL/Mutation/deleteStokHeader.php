<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokHeader;
class deleteStokHeader extends Mutation
{
    protected $attributes = [
        'name' => 'deleteStokHeader',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('stokHeaderType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'id_gudang' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'nomor' => [
                'type' => Type::string()
            ],
            'jenis' => [
                'type' => Type::string()
            ],
            'tanggal' => [
                'type' => Type::string()
            ]
            ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $stokHeader = StokHeader::where('id', $args['id'])->first();
        $stokHeader->delete();
        return $stokHeader;
    }
}
