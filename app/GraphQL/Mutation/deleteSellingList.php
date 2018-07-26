<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\SellingList;
class deleteSellingList extends Mutation
{
    protected $attributes = [
        'name' => 'deleteSellingList',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('sellingListType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'user_id' => [
                'type' => Type::string()
            ],
            'sku_barang'=>[
                'type'=> Type::string()
            ],
            'harga' => [
                'type' => Type::Int()
            ],
            
        ] ;   
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $selling = SellingList::where('id', $args['id'])->first();
        $selling->delete();
        return $selling;
    }
}
