<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\SellingList;
use App\Barang;
class tampilKatalogQuery extends Query
{
    protected $attributes = [
        'name' => 'tampilKatalogQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('sellingListType'));
    }

   public function args()
   {
       return [

           'id_user' => ['name' => 'id_user', 'type' => Type::string()],
           
       ];
   }

   public function resolve($root, $args, $context, ResolveInfo $info)
   { 

$barang=SellingList::where('id_user',$args['id_user'])->get();
return $barang;
   }
}