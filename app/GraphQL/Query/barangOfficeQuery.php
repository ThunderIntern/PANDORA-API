<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
USE App\Barang;
use Carbon\Carbon;
class barangOfficeQuery extends Query
{
    protected $attributes = [
        'name' => 'barangOfficeQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('barangType'));
     }

    public function args()
    {
        return [
            'skip' => ['name' => 'skip', 'type' => Type::int()],
            'take' => ['name' => 'take', 'type' => Type::int()],
            'sku' => ['name' => 'sku', 'type' => Type::string()],
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'sku' => ['name' => 'sku', 'type' => Type::string()],
            'nama' => ['name' => 'nama', 'type' => Type::string()],
           
            'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
            'berat' => ['name' => 'berat', 'type' => Type::Int()],
            'dimensi' => ['name' => 'dimensi', 'type' => Type::string()],

            // 'pricing' => ['name' => 'pricing', GraphQL::type('pricingType')],
            // 'stokDetail' => ['name' => 'pricing', GraphQL::type('stokDetailType')],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    { if (isset($args['nama'])) {
        $gudang= Barang::with(['pricing' => function($q){
            $q->hariIni(Carbon::now());
        }])->wherehas('stokDetail',function($p){
                $p->where('kuantitas','!=',0);
        })->where('nama','like','%'.$args['nama'].'%')
              ->skip($args['skip'])->take($args['take'])
            ->get();
    
        return $gudang;
    }else if(isset($args['id'])) {
        $gudang= Barang::with(['pricing' => function($q){
            $q->hariIni(Carbon::now());
        }])->wherehas('stokDetail',function($p){
                $p->where('kuantitas','!=',0);
        })->where('id',$args['id'])
            //   ->skip($args['skip'])->take($args['take'])
            ->get();
            return $gudang;
    }else if(isset($args['sku'])) {
        $gudang= Barang::with(['pricing' => function($q){
            $q->hariIni(Carbon::now());
        }])->wherehas('stokDetail',function($p){
                $p->where('kuantitas','!=',0);
        })->where('sku',$args['sku'])
            //   ->skip($args['skip'])->take($args['take'])
            ->get();
            return $gudang;
    }
    else{
        $barang= Barang::with(['pricing' => function($q){
            $q->hariIni(Carbon::now());
        }]) ->wherehas('stokDetail',function($p){
            $p->where('kuantitas','!=',0);})
            ->skip($args['skip'])->take($args['take'])
            ->get();
               
            
      return $barang;
           
    }
}

}