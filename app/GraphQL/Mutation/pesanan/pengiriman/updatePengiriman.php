<?php

namespace App\GraphQL\Mutation\pesanan\pengiriman;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pengiriman;
class updatePengiriman extends Mutation
{
    protected $attributes = [
        'name' => 'UpdatePengiriman',
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
        
        $args['nomor_resi']? $Pengiriman->nomor_resi = $args['nomor_resi']: '';
        $args['tanggal_pengiriman']? $Pengiriman->tanggal_pengiriman = $args['tanggal_pengiriman']: '';
       
        $args['alamat_pengirim']? $Pengiriman->alamat_pengirim = $args['alamat_pengirim']: '';
        $args['nama_pengirim']? $Pengiriman->nama_pengirim = $args['nama_pengirim']: '';
        $args['no_telp_pengirim']? $Pengiriman->no_telp_pengirim = $args['no_telp_pengirim']: '';
        $args['kodepos_pengirim']? $Pengiriman->kodepos_pengirim = $args['kodepos_pengirim']: '';
      
        $args['alamat_penerima']? $Pengiriman->alamat_penerima = $args['alamat_pengirim']: '';
        $args['nama_penerima']? $Pengiriman->nama_penerima = $args['nama_penerima']: '';
        $args['no_telp_penerima']? $Pengiriman->no_telp_penerima = $args['no_telp_penerima']: '';
        $args['kodepos_penerima']? $Pengiriman->kodepos_penerima = $args['kodepos_penerima']: '';
      
        $args['jasa_ekspedisi']? $Pengiriman->jasa_ekspedisi = $args['jasa_ekspedisi']: '';
        $args['tipe_paket']? $Pengiriman->tipe_paket = $args['tipe_paket']: '';
     
        $args['longitude']? $Pengiriman->longitude = $args['longitude']: '';
        $args['latitude']? $Pengiriman->latitude = $args['latitude']: '';
     
        $args['id_pesanan_header']? $Pengiriman->id_pesanan_header = $args['id_pesanan_header']: '';
       
        $Pengiriman->save();
        return $Pengiriman;
    }
}
