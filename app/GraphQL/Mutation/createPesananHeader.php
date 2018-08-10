<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Carbon\Carbon;
use App\PesananHeader;
class createPesananHeader extends Mutation
{
    protected $attributes = [
        'name' => 'CreatePesananHeader',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pesananHeaderType');
    }

    public function args()
    {
        return [
            'nomor' => ['name' => 'nomor', 'type' => Type::string()],
            'tanggal' => ['name' => 'tanggal', 'type' => Type::string()],
           
            'total' => ['name' => 'total', 'type' => Type::Int()],
            'ongkos_kirim' => ['name' => 'ongkos_kirim', 'type' => Type::Int()],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {   
        
        $PesananHeader = new PesananHeader();
        $dt=date('Y.dm.');
        $cek=count(PesananHeader::where('nomor','LIKE', $dt.'%')->get());
        $number= str_pad($cek+1, 4, '0', STR_PAD_LEFT);
        $nomor=$dt.$number;
        $h=Carbon::now();
      
        $dates=date('Y-m-d H:i:s');
        $PesananHeader->tanggal=$dates;
        $PesananHeader->nomor=$nomor;
        $PesananHeader->total=$args['total'];
        $PesananHeader->ongkos_kirim=$args['ongkos_kirim'];
      
        $PesananHeader->save();
        return $PesananHeader;
    }
}
