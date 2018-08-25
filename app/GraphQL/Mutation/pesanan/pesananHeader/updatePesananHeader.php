<?php

namespace App\GraphQL\Mutation\pesanan\pesananHeader;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class updatePesananHeader extends Mutation
{
    protected $attributes = [
        'name' => 'UpdatePesananHeader',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pesananHeaderType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'nomor' => ['name' => 'nomor', 'type' => Type::string()],
            'tanggal' => ['name' => 'tanggal', 'type' => Type::string()],
           
            'id_user' => ['name' => 'id_user', 'type' => Type::string()],
            'total' => ['name' => 'total', 'type' => Type::Int()],
            'ongkos_kirim' => ['name' => 'ongkos_kirim', 'type' => Type::Int()],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $PesananHeader = PesananHeader::where('id', $args['id'])->first();
        
            $args['nomor']? $PesananHeader->nomor = $args['nomor']: '';
            $args['tanggal']? $PesananHeader->tanggal = $args['tanggal']: '';
            $args['total']? $PesananHeader->total = $args['total']: '';
            $args['ongkos_kirim']? $PesananHeader->ongkos_kirim = $args['ongkos_kirim']: '';
            $args['id_user']? $PesananHeader->id_user = $args['id_user']: '';
            $PesananHeader->save();
            return $PesananHeader;
    }
}
