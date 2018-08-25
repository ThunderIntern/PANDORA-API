<?php

namespace App\GraphQL\Mutation\warehouse\stokHeader;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokHeader;
class updateStokHeader extends Mutation
{
    protected $attributes = [
        'name' => 'updateStokHeader',
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
                'type' => (Type::Int())
            ],
            'id_gudang' => [
                'type' => (Type::Int())
            ],
            'nomor' => [
                'type' => (Type::string())
            ],
            'jenis' => [
                'type' => (Type::string())
            ],
            'tanggal' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $StokHeader = StokHeader::where('id', $args['id'])->first();
        $args['id_gudang']? $StokHeader->id_gudang = $args['id_gudang']: '';
        $args['nomor']? $StokHeader->nomor = $args['nomor']: '';
        $args['jenis']? $StokHeader->jenis = $args['jenis']: '';
        $args['tanggal']? $StokHeader->tanggal = $args['tanggal']: '';
        $StokHeader->save();
        return $StokHeader;
    }
}
