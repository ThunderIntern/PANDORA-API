<?php

namespace App\GraphQL\Mutation\pesanan\pengiriman;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pengiriman;
class createPengiriman extends Mutation
{
    protected $attributes = [
        'name' => 'CreatePengiriman',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pengirimanType');
    }

    public function args()
    {
        return [
           
            'nomor_resi' => [
                'type' => Type::string()
            ],
            'tanggal_pengiriman' => [
                'type' => Type::string()
            ],
            'alamat_pengirim' => [
                'type' => Type::string()
            ],
            'nama_pengirim' => [
                'type' => Type::string()
            ],
            'no_telp_pengirim' => [
                'type' => Type::string()
            ],
            'kodepos_pengirim' => [
                'type' => Type::string()
            ],
            'alamat_penerima' => [
                'type' => Type::string()
            ],
            'nama_penerima' => [
                'type' => Type::string()
            ],
            'no_telp_penerima' => [
                'type' => Type::string()
            ],
            'kodepos_penerima' => [
                'type' => Type::string()
            ],
            'jasa_ekspedisi' => [
                'type' => Type::string()
            ],
            'tipe_paket' => [
                'type' => Type::string()
            ],
            'longitude' => [
                'type' => Type::string()
            ],
            'latitude' => [
                'type' => Type::string()
            ],
            'id_pesanan_header' => [
                'type' => Type::Int()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $Pengiriman = new Pengiriman();
        $Pengiriman->fill($args);
        $Pengiriman->save();
        return $Pengiriman;
    }
}
