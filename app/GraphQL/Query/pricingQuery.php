<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pricing;
use App\Barang;
use Carbon\Carbon;
class pricingQuery extends Query
{
    protected $attributes = [
        'name' => 'pricingQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('pricingType'));
   
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'sku_barang' => ['name' => 'sku_barang', 'type' => Type::string()],
            'tanggal' => ['name' => 'tanggal', 'type' => Type::string()],
            'harga' => ['name' => 'harga', 'type' => Type::Int()],
            'harga_promo' => ['name' => 'harga_promo', 'type' => Type::Int()],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $barang=Barang::where('sku', $root->sku)->with(['pricing' => function($q){
            $q-hariIni(Carbon::now());
        }])->first();
        
    }
}
