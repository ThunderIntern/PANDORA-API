<?php

namespace App\GraphQL\Mutation\warehouse\kategori;


use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\KategoriBarang;
class createKategoriBarang extends Mutation
{
    protected $attributes = [
        'name' => 'createKategoriBarang',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('kategoribarangType');
    }

    public function args()
    {
        return [
            'id_kategori'  => [ 'type' => (Type::int())],
            'id_barang'  => [ 'type' => (Type::int())],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $kategoribarang = new KategoriBarang();
        $kategoribarang->fill($args);
        $kategoribarang->save();
        return $kategoribarang;
  
    }
}
