<?php

namespace App\GraphQL\Mutation\warehouse\kategori;


use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\KategoriBarang;
use App\Kategori;
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
            'id_barang'  => [ 'type' => (Type::int())],
            'id_kategori'  => [ 'type' => (Type::int())],
    
           
            
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    { 
        
        $kategorib =KategoriBarang::where('id_barang', $args['id_barang'])->first();
       
        $args['id_kategori']? $kategorib->id_kategori = $args['id_kategori']: '';
      
        $kategorib->save();
        return $kategorib;
  //error
    }
}
