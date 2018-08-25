<?php

namespace App\GraphQL\Mutation\warehouse\kategori;


use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Kategori;
class updateKategori extends Mutation
{
    protected $attributes = [
        'name' => 'updateKategori',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('kategoriType');
    }

    public function args()
    {
        return [
            'id'  => [ 'type' => (Type::int())],
           
            'kategori'  => [ 'type' => (Type::string())],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $kategori = Kategori::where('id', $args['id'])->first();;
       $args['kategori']? $kategori->kategori = $args['kategori']: '';
    
        $kategori->save();
        return $kategori;
  
    }
}
