<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang;
use App\Events\HargaEvent;
class barangQuery extends Query
{
    protected $attributes = [
        'name' => 'barangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('barangType'));
     }

    public function args()
    {
        return [
            'sku' => ['name' => 'sku', 'type' => Type::string()],
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'sku' => ['name' => 'sku', 'type' => Type::string()],
            'nama' => ['name' => 'nama', 'type' => Type::string()],
            
            'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        // $check = new Barang($args);
        // $event = event(new HargaEvent($check));
        // if($event){
       
         if(isset($args['sku'])) {
            return Barang::where('sku', $args['sku'])->get() ;
        }else if (isset($args['id'])) {
            return Barang::where('id' , $args['id'])->get();
        } else if(isset($args['nama'])) {
            return Barang::where('nama', $args['nama'])->get();
        
          }  else {
                return Barang::all();
            }
        // }else {
        //         return Barang::all();
        //     }
        
       
    }
}

