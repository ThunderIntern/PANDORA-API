<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Gudang;

class gudangQuery extends Query
{
    protected $attributes = [
        'name' => 'gudangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return  Type::ListOf(GraphQL::type('gudangType'));
  
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            
            'nama' => ['name' => 'nama', 'type' => Type::string()],
            'alamat'  => [ 'type' => GraphQL::type('IAlamat')],
            'skip' => ['name' => 'skip', 'type' => Type::int()],
            'take' => ['name' => 'take', 'type' => Type::int()],
        
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
        if (isset($args['nama'])) {
            $gudang= Gudang::where('nama' ,'like', $args['nama'].'%') 
            ->skip($args['skip'])->take($args['take'])->get();
        
            return $gudang;
     

        }else {
            $gudang= Gudang::select('id','nama','alamat')
            ->skip($args['skip'])->take($args['take'])->get();
            
            return  $gudang;
        }
    }
}
