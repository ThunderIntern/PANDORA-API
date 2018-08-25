<?php

namespace App\GraphQL\Mutation\pesanan\statusPengiriman;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\StatusPengiriman;
class deleteStatusPengiriman extends Mutation
{
    protected $attributes = [
        'name' => 'DeleteStatusPengiriman',
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
        
        $StatusPengiriman = StatusPengiriman::where('id', $args['id'])->first();
        $StatusPengiriman->delete();
        return $StatusPengiriman;
    }
}
