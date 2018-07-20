<?php

namespace App\GraphQL\Mutation;

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
            'alamat'  => [ 'type' => Type::nonNull(Type::string())],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $gudang = new Gudang();
        $gudang->fill($args);
        $gudang->save();
        return $gudang;
    }
}
