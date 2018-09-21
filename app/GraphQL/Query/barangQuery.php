<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Barang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
            'skip' => ['name' => 'skip', 'type' => Type::int()],
            'take' => ['name' => 'take', 'type' => Type::int()],
        
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
        }])->where('nama','like',$args['nama'].'%')
        ->skip($args['skip'])->take($args['take'])
            ->get();
    
        return $gudang;
    }else if(isset($args['sku'])){
        $gudang= Barang::with(['pricing' => function($q){
            $q->hariIni(Carbon::now());
        }])->where('sku','like',$args['sku'].'%')
        // ->skip($args['skip'])->take($args['take'])
            ->get();
    
        return $gudang;
    }
        return Barang::with(['pricing' => function($q){
            $q->hariIni(Carbon::now());
        }])
            ->get();
            // ->wherehas('stokDetail',function($p){
            //     $p->where('kuantitas','!=',0);})
    }
}

