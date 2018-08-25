<?php

namespace App\GraphQL\Mutation\warehouse\gudang;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Gudang;

class createGudang extends Mutation
{
    protected $attributes = [
        'name' => 'createGudang',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('gudangType');
    }

    public function args()
    {
        return [
            'nama' => [ 'type' => Type::nonNull(Type::string())],
            'alamat'  => [ 'type' => GraphQL::type('IAlamat')],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $gudang = new Gudang();
       
        $gudang->nama=$args['nama'];
        $gudang->alamat=$args['alamat'];
        $gudang->save();
        // $alamat=$gudang->setAlamatDecode($gudang->alamat);
        
        // $gudang->save();
        return $gudang;
    }
}
