<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pricing;
class deletePricing extends Mutation
{
    protected $attributes = [
        'name' => 'deletePricing',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pricingType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
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
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $gudang = Pricing::where('id', $args['id'])->first();
        $gudang->delete();
        return $gudang;
    }
}
