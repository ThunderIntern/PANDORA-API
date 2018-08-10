<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Status;
class createStatus extends Mutation
{
    protected $attributes = [
        'name' => 'CreateStatus',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('statusType');
   
    }

    public function args()
    {
        return [
            'status'=>[
                'type'=> Type::string()
                
            ],
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            
            'tanggal' => [
                'type' => Type::string()
            ],
           
            'id_pesanan_header'=>[
                'type'=> Type::Int()
            ],   
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $Status = new Status();
        $Status->fill($args);
        $Status->save();
        return $Status;
    }
}
