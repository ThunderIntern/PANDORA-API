<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang;
class countSearchingBarangAdminQuery extends Query
{
    protected $attributes = [
        'name' => 'countBarangAdmin',
        'description' => 'A query'
    ];

    public function type()
    {
        return (GraphQL::type('countBarangType'));
    }

    public function args()
    {
        return [
             'skip' => ['name' => 'skip', 'type' => Type::int()],
            'take' => ['name' => 'take', 'type' => Type::int()],
            'nama' => ['name' => 'nama', 'type' => Type::string()],

        ];
    }   

    public function resolve($root, $args, $context, ResolveInfo $info)
    {if (isset($args['nama'])) {
        $gudang= Barang::with(['pricing' => function($q){
            $q->hariIni(Carbon::now());
        }])->where('nama','like',$args['nama'].'%')
        // ->skip($args['skip'])->take($args['take'])
            ->count();
    
            return ['jumlah' => $gudang];
    }
}
}