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
            'nama' => ['name' => 'nama', 'type' => Type::string()],
        ];
    }   

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
       
            $gudang= Gudang::where('nama' ,'like', $args['nama'].'%') 
            ->count();        
           

       if($gudang % 2 == 1){
        $jumlahh=$gudang+1;
        return ['jumlah' => $jumlahh];
    }else{
     return ['jumlah' => $gudang];
    }
        
    }
}
