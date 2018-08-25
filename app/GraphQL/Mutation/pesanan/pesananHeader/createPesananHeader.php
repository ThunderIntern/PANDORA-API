<?php

namespace App\GraphQL\Mutation\pesanan\pesananHeader;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\PesananHeader as ph;

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
            'id_user' => ['name' => 'id_user', 'type' => Type::string()],
            'total' => ['name' => 'total', 'type' => Type::Int()],
            'ongkos_kirim' => ['name' => 'ongkos_kirim', 'type' => Type::Int()],
            
            'id_user' => ['name' => 'id_user', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {   
        try{
        $PesananHeader = new ph();
     

        $dt=date('Y.dm.');
        $cek=count(ph::where('nomor','LIKE', $dt.'%')->get());
        $number= str_pad($cek+1, 4, '0', STR_PAD_LEFT);
        $nomor=$dt.$number;
      
        $dates=date('Y-m-d H:i:s');
        $PesananHeader->tanggal=$dates;
        $PesananHeader->nomor=$nomor;
        $PesananHeader->total=$args['total'];
        $PesananHeader->ongkos_kirim=$args['ongkos_kirim'];
        $PesananHeader->id_user=$args['id_user'];
      
            
       
        $PesananHeader->save();
        return $PesananHeader;
        }catch(\Exception $e){
            DB:Rollback();
        }
    }
}
