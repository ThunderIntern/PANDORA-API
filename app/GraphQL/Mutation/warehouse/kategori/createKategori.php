<?php

namespace App\GraphQL\Mutation\warehouse\kategori;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Kategori;
class createKategori extends Mutation
{
    protected $attributes = [
        'name' => 'createKategori',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('kategoriType');
    }

    public function args()
    {
        return [
            'kategori'  => [ 'type' => (Type::string())],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $kategori = new Kategori();
        $kategori->fill($args);
        $kategori->save();
        return $kategori;
  
    }
}
