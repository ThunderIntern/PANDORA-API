<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class pengirimanType extends BaseType
{
    protected $attributes = [
        'name' => 'pengirimanType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => (Type::Int())
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
            'pesananHeader' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('pesananHeaderType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->pesananHeader->where('id_pesanan_header', $args['id']);
                    }

                    return $root->pesananHeader;
                }
            ],
            'statusPengiriman' => [
                'args' => [
                    'id' => [
                        'type'        => Type::Int(),
                        'description' => 'id pesanan',
                    ],
                ],
                'type' => (GraphQL::type('statusPengirimanType')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id'])) {
                        return  $root->statusPengiriman->where('id_pengiriman', $args['id']);
                    }

                    return $root->statusPengiriman;
                }
            ],
        ];
    }
}
