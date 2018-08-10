<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pengiriman;
class pengirimanQuery extends Query
{
    protected $attributes = [
        'name' => 'pengirimanQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('pengirimanType'));
  
    }

    public function args()
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
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {  if (isset($args['id'])) {
        return Pengiriman::where('id' , $args['id'])->get();
    /* } else if(isset($args['email'])) {
        return User::where('email', $args['email'])->get();
    }else if(isset($args['username'])) {
        return User::where('username', $args['username'])->get(); 
    }else if(isset($args['password'])) {
        return User::where('password', $args['password'])->get(); 
       */
    }else {
        return Pengiriman::all();
    }
    }
}
