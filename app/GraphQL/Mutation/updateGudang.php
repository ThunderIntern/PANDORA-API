<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Gudang;
class updateGudang extends Mutation
{
    protected $attributes = [
        'name' => 'updateGudang',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('gudangType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'nama' => [
                'type' => Type::string()
            ],
            'alamat' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $gudang = Gudang::where('id', $args['id'])->first();
        
            $args['nama']? $gudang->nama = $args['nama']: '';
            $args['alamat']? $gudang->alamat = $args['alamat']: '';
           
            $gudang->save();
            return $gudang;
    }
}
