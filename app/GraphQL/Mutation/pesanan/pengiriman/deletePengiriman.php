<?php

namespace App\GraphQL\Mutation\pesanan\pengiriman;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pengiriman;
class DeletePengiriman extends Mutation
{
    protected $attributes = [
        'name' => 'DeletePengiriman',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pengirimanType');

    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
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
        $Pengiriman = Pengiriman::where('id', $args['id'])->first();
        $Pengiriman->delete();
        return $Pengiriman;
    }
}
