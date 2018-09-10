<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\Barang;
use App\Pricing;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class barangType extends BaseType
{

    protected $attributes = [
        'name' => 'barangType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
 
            'sku'=>[
                'type'=> Type::string()
                
            ],
            'id' => [
                'type' => (Type::Int())
            ],
            
            'nama' => [
                'type' => Type::string()
            ],
            'dimensi' => [
                'type' => GraphQL::type('Dimensi')
            ],
            'berat' => [
                'type' => Type::Int()
            ],
            'deskripsi'=>[
                'type'=> Type::string()
            ],
            'pricing' => [
                
                'type' => (GraphQL::type('pricingType'))                
            ],
            'stokDetail' => [
                
                'type' => type::listOf(GraphQL::type('stokDetailType'))                
            ],
     
            'image' => [
                
                
                'type' => Type::listOf(GraphQL::type('imageType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->image->where('id_barang', $args['id']);
                    }

                    return $root->image;
                }
            ],
            
            'pricing' => [
                
                
                'type' => (GraphQL::type('pricingType')),
                
                'resolve' => function ($root, $args) {
                   

                    return $root->pricing;
                }
            ],
            
            'stokDetail' => [
                
                
                'type' => (GraphQL::type('stokDetailType')),
                
                'resolve' => function ($root, $args) {
                  

                    return $root->stokDetail;
                }
            ],
            'kategori' => [
                
                'type' => Type::ListOf(GraphQL::type('kategoribarangType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id_barang'])) {
                        return  $root->kategoribarang->where('id_barang', $args['id_barang']);
                    }

                    return $root->kategoribarang;
                }
            ],
        ];
    }
}
