<?php

namespace App\GraphQL\Mutation\selingList\sellingList;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\SellingList;
class createSellingList extends Mutation
{
    protected $attributes = [
        'name' => 'createSellingList',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('sellingListType');
    }

    public function args()
    {
        return [
         
               
            'id_user' => [
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
        $selling = new SellingList();
        $selling->id_user=$args['id_user'];
        $selling->harga=$args['harga'];
        $selling->sku_barang=$args['sku_barang'];
        $selling->save();
        return $selling;
    }
}
