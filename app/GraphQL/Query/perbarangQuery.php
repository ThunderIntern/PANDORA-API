<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang;
class perbarangQuery extends Query
{
    protected $attributes = [
        'name' => 'perbarangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return (GraphQL::type('barangType'));
    }

   public function args()
   {
       return [
           'sku' => ['name' => 'sku', 'type' => Type::string()],
           'id' => ['name' => 'id', 'type' => Type::Int()],
           'sku' => ['name' => 'sku', 'type' => Type::string()],
           'nama' => ['name' => 'nama', 'type' => Type::string()],
          
           'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
           'berat' => ['name' => 'berat', 'type' => Type::Int()],
           'dimensi' => ['name' => 'dimensi', 'type' => Type::string()],
       ];
   }

   public function resolve($root, $args, $context, ResolveInfo $info)
   {
    
        if(isset($args['sku'])) {
           return Barang::where('sku', $args['sku'])->first() ;
       }else if (isset($args['id'])) {
           return Barang::where('id' , $args['id'])->first();
       } else if(isset($args['nama'])) {
           return Barang::where('nama', $args['nama'])->first();
       
         }  else {
               return Barang::all();
           }
     
       
      
   }
}

