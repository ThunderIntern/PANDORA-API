<?php

namespace App\GraphQL\Query;
use Illuminate\Support\Facades\DB;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Kategori;
class filterBarangQuery extends Query
{
    protected $attributes = [
        'name' => 'filterBarangQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('kategoriType'));
      
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::Int()],
            'nama' => [ 'type' => Type::string()],
            'jenis' => [ 'type' => Type::string()],
            'kategori'		=> 	[
                'name' 	=> 'kategori', 		
                'type' 	=> Type::string(),
                'rules' => ['nullable', 'string'],
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
            $kategori= Kategori::where('nama','like',$args['kategori'].'%')->first();
            $filter=Kategori::where('id_parent',$kategori->id)->get();
            return $filter;
        }
    }

