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
        return  type::listOf(GraphQL::type('gudangType'));
  
    }

    public function args()
    {
        return [
            'nama' => ['name' => 'nama', 'type' => Type::string()],
            'skip' => ['name' => 'skip', 'type' => Type::Int()],
            'take' => ['name' => 'take', 'type' => Type::Int()],
            
            
            
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
        if (isset($args['nama'])) {
            $gudang= Gudang::where('nama' ,'like', $args['nama'].'%') 
            ->skip($args['skip'])->take($args['take'])->get();
        
            return $gudang;
     
     
                   
        }else {
            $gudang= Gudang::all();
            
            return  $gudang;
        }
    }
}
