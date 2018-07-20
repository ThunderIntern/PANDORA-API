<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokDetail;
class createStokDetail extends Mutation
{
    protected $attributes = [
        'name' => 'createStokDetail',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('stokDetailType');
    }

    public function args()
    {
        return [
            'kuantitas' => [ 'type' => Type::nonNull(Type::Int())],
            'satuan'  => [ 'type' => (Type::string())],
            'id_stok_header'  => [ 'type' => Type::nonNull(Type::Int())],
            'id_barang'=>['type'=>Type::nonNull(Type::Int())],
 
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $stokDetail = new StokDetail();
        $stokDetail->fill($args);
        $stokDetail->save();
        return $stokDetail;
  
    }
}
