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
            'nama'  => [ 'type' => (Type::string())],
            'jenis'  => [ 'type' => (Type::string())],
            'id_parent'		=> 	[
                'name' 	=> 'id_parent', 
                'type' 	=> Type::Int(),
                'rules' => ['nullable', 'integer'],
            ],   
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $kategori = new Kategori();
        $kategori->nama=$args['nama'];
        $kategori->jenis=$args['jenis'];
       $args['id_parent']? $kategori->id_parent = $args['id_parent']: '';       $args['id_parent']?  $kategori->id_parent=  $args['id_parent']:'';
        $kategori->save();
        return $kategori;
  
    }
}
