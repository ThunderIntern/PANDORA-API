<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Support\Facades\DB;
use App\StokHeader as sh;
use App\StokDetail as sd;
use App\Barang as b;
use App\Image as i;
use App\Pricing as p;
class stokDetailFull extends Mutation
{
    protected $attributes = [
        'name' => 'stokDetailFull',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('stokDetailType');
   
    }

    public function args()
    {
        return [
            'id_stok_header'=>['type'=>Type::nonNull(Type::Int())],
            'kuantitas'=>['type'=>Type::nonNull(Type::Int())],
            'satuan'=>['type'=>Type::nonNull(Type::string())],
           
            'sku'=>[
                'type'=>Type::nonNull(Type::string())
            ],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        DB::beginTransaction();
        $stokHeader=new sh();
        $stokDetail = new sd();
       
        $cekbarang=b::where('sku','=', $args['sku'])->first();
       
        
           

        
        $stokDetail->id_stok_header=$args['id_stok_header'];
        $stokDetail->satuan=$args['satuan'];
        $stokDetail->kuantitas=$args['kuantitas'];
        $stokDetail->id_barang=$cekbarang->id;
        $stokDetail->save();

        DB::Commit();
        return $stokDetail;
    }
}
