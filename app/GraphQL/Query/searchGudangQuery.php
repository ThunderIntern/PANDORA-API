<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Gudang;
class searchGudangQuery extends Query
{
    protected $attributes = [
        'name' => 'searchGudangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return  (GraphQL::type('gudangType'));
  
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            
            'nama' => ['name' => 'nama', 'type' => Type::string()],
            'alamat'  => [ 'type' => GraphQL::type('IAlamat')],
            
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
        if (isset($args['nama'])) {
            $gudang= Gudang::where('nama' , $args['nama'])->first();
        
            return $gudang;
     
        }else if(isset($args['alamat'])) {
            return User::where('alamat', $args['alamat'])->get(); 
           
        }else {
            $gudang= Gudang::all();
            
            return  $gudang;
        }
    }
}
