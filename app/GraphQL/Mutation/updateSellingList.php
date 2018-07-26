<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\SellingList;
class updateSellingList extends Mutation
{
    protected $attributes = [
        'name' => 'updateSellingList',
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
     
       
     ];
 }

 public function resolve($root, $args, $context, ResolveInfo $info)
 {
     $selling = SellingList::where('id', $args['id'])->first();
     $args['user_id']? $selling->user_id = $args['user_id']: '';
     $args['sku_barang']? $selling->sku_barang = $args['sku_barang']: '';
     $args['harga']? $selling->harga = $args['harga']: '';
    
    
     $selling->save();
     return $selling;
 }
}
