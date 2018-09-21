<?php

namespace App\GraphQL\Mutation\selingList\sellingList;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\SellingList;
use App\Barang;
use App\Providers\Models\User;

class createSellingList extends Mutation
{
    protected $attributes = [
        'name' => 'createSellingList',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('sellingListType');
    }

    public function args()
    {
        return [
         
               
            'id_user' => [
                'type' => Type::string()
            ],
            'id_barang'=>[
                'type'=> Type::int()
            ],
            'harga' => [
                'type' => Type::Int()
            ],
            
        ] ;   
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        //cek user
        $iduser=User::where('username',$args['id_user'])->first();
//cek barang
$sku=Barang::where('id',$args['id_barang'])->first();
        //
        $selling = new SellingList();
        $selling->id_user=$iduser->id;
        $selling->harga=$args['harga'];
        $selling->sku_barang=$sku->sku;
        $selling->save();
        return $selling;
    }
}
