<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pricing;
class createPricing extends Mutation
{
    protected $attributes = [
        'name' => 'createPricing',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pricingType');
    }

    public function args()
    {
        return [
         
               
            'sku_barang' => [
                'type' => Type::string()
            ],
            'tanggal'=>[
                'type'=> Type::string()
            ],
            'harga' => [
                'type' => Type::Int()
            ],
            'harga_promo' => [
                'type' => Type::Int()
            ]
        ] ;   
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $pricing = new Pricing();
        $pricing->fill($args);
        $pricing->save();
        return $pricing;
    }
}
