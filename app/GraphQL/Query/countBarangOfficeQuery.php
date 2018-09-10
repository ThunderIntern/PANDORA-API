<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Carbon\Carbon;
use App\Barang;
class countBarangOfficeQuery extends Query
{
    protected $attributes = [
        'name' => 'countBarangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return (GraphQL::type('countBarangType'));
    }

    public function args()
    {
        return [
            'jumlah' => ['name' => 'jumlah', 'type' => Type::Int()],
        ];
    }   

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
    $jumlah=(Barang::with(['pricing' => function($q){
        $q->hariIni(Carbon::now());
    }]) ->wherehas('stokDetail',function($p){
        $p->where('kuantitas','!=',0);})
        // ->skip($args['skip'])->take($args['take'])
        ->count());
   

        if( $jumlah % 2== 1){

            $jumlahh= $jumlah+1;

            return ['jumlah' => $jumlahh];
        }else{
         return ['jumlah' => $jumlah];
        }
        }
}
