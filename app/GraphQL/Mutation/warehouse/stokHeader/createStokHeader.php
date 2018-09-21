<?php

namespace App\GraphQL\Mutation\warehouse\stokHeader;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StokHeader ;
class createStokHeader extends Mutation
{
    protected $attributes = [
        'name' => 'createStokHeader',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('stokHeaderType');
    }

    public function args()
    {
        return [
            'jenis'  => [ 'type' => Type::nonNull(Type::string())],
            'tanggal'  => [ 'type' => Type::nonNull(Type::string())],
            'id_gudang'=>['type'=>Type::nonNull(Type::Int())],
 
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $stokHeader = new StokHeader();
        $dt=date('Y.dm.');
        $cek=count(StokHeader::where('nomor','LIKE', $dt.'%')->get());
        $number= str_pad($cek+1, 4, '0', STR_PAD_LEFT);
        $nomor=$dt."P".$number;
       
        $stokHeader->nomor=$nomor;
        $stokHeader->jenis=$args['jenis'];
        $stokHeader->tanggal=$args['tanggal'];
        $stokHeader->id_gudang=$args['id_gudang'];
      
        $stokHeader->save();
        return $stokHeader;
    }
}
