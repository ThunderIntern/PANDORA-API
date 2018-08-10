<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StatusPengiriman;
class createStatusPengiriman extends Mutation
{
    protected $attributes = [
        'name' => 'CreateStatusPengiriman',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('statusPengirimanType');
    
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
            'lokasi' => [
                'type' => Type::string()
            ],
            'id_pengiriman'=>[
                'type'=> Type::Int()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $StatusPengiriman = new StatusPengiriman();
        $StatusPengiriman->fill($args);
        $StatusPengiriman->save();
        return $StatusPengiriman;
    }
}
