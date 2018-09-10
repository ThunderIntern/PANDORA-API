<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Gudang;
class countGudangQuery extends Query
{
    protected $attributes = [
        'name' => 'countGudangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return (GraphQL::type('countGudangType'));
    }

    public function args()
    {
        return [
            'jumlah' => ['name' => 'jumlah', 'type' => Type::Int()],
        ];
    }   

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $gudang= Gudang::select('id','nama','alamat')
       ->count();
       if($gudang % 2 == 1){
        $jumlahh=$gudang+1;
        return ['jumlah' => $jumlahh];
    }else{
     return ['jumlah' => $gudang];
    }
        
    }
}
