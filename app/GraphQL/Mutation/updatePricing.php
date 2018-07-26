<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pricing;
class updatePricing extends Mutation
{
    protected $attributes = [
        'name' => 'updatePricing',
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
        $pricing = Pricing::where('id', $args['id'])->first();
        $args['sku_barang']? $pricing->sku_barang = $args['sku_barang']: '';
        $args['tanggal']? $pricing->tanggal = $args['tanggal']: '';
        $args['harga']? $pricing->harga = $args['harga']: '';
        $args['harga_promo']? $pricing->harga_promo = $args['harga_promo']: '';
       
       
        $pricing->save();
        return $pricing;
    }
}
