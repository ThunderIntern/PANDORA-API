<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\SellingList;
use App\Barang;
class tampilKatalog extends Mutation
{
    protected $attributes = [
        'name' => 'tampilKatalog',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('barangType'));
    }

   public function args()
   {
       return [

           'id_user' => ['name' => 'id_user', 'type' => Type::string()],
           
       ];
   }

   public function resolve($root, $args, $context, ResolveInfo $info)
   {  
       $selling=SellingList::where('id_user',$args['id_user'])->first();
       
    $gudang= Barang::with('sellinglist' ,function($q){
    $q->where('sku_barang',$selling->sku_barang);
})
// ->skip($args['skip'])->take($args['take'])
    ->get();

return $gudang;
   }
}