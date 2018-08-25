<?php

namespace App\GraphQL\Mutation\warehouse\kategori;


use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\KategoriBarang;
class updateKategoriBarang extends Mutation
{
    protected $attributes = [
        'name' => 'updateKategoriBarang',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('kategoribarangType'));
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
        $kategori =KategoriBarang::where('id_barang', $args['id_barang'])->first();
       $args['id_kategori']? $kategori->id_kategori = $args['id_kategori']: '';
      
        $kategori->save();
        return $kategori;
  //error
    }
}
