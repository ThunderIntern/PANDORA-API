<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokHeader;
class createStokHeader extends Mutation
{
    protected $attributes = [
        'name' => 'createStokHeader',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('stokHeaderType');
    }

    public function args()
    {
        return [
            'nomor' => [ 'type' => Type::nonNull(Type::string())],
            'jenis'  => [ 'type' => Type::nonNull(Type::string())],
            'tanggal'  => [ 'type' => Type::nonNull(Type::string())],
            'id_gudang'=>['type'=>Type::nonNull(Type::Int())],
 
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $stokHeader = new StokHeader();
        $stokHeader->fill($args);
        $stokHeader->save();
        return $stokHeader;
    }
}
