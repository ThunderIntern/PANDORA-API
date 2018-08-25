<?php

namespace App\GraphQL\Mutation\warehouse\kategori;


use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\KategoriBarang;
class deleteKategoriBarang extends Mutation
{
    protected $attributes = [
        'name' => 'deleteKategoriBarang',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('kategoribarangType'));
    }

    public function args()
    {
        return [
           
            'id_barang'  => [ 'type' => (Type::Int())],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $kategori =  KategoriBarang::where('id_barang',$args['id_barang'])->first();
        $kategori->delete();
        return $kategori;
  //error
    }
}
