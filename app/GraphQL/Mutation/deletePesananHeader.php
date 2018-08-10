<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\PesananHeader;
class deletePesananHeader extends Mutation
{
    protected $attributes = [
        'name' => 'DeletePesananHeader',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pesananHeaderType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'nomor' => ['name' => 'nomor', 'type' => Type::string()],
            'tanggal' => ['name' => 'tanggal', 'type' => Type::string()],
           
            'total' => ['name' => 'total', 'type' => Type::Int()],
            'ongkos_kirim' => ['name' => 'ongkos_kirim', 'type' => Type::Int()],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $PesananHeader = PesananHeader::where('id', $args['id'])->first();
        $PesananHeader->delete();
        return $PesananHeader;
    }
}
