<?php

namespace App\GraphQL\Mutation\pesanan\status;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Status;
class updateStatus extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateStatus',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('statusType');
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
           
            'id_pesanan_header'=>[
                'type'=> Type::Int()
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $Status = Status::where('id', $args['id'])->first();
        
        $args['status']? $Status->status = $args['status']: '';
        $args['tanggal']? $Status->tanggal = $args['tanggal']: '';
        $args['id_pesanan_header']? $Status->id_pesanan_header = $args['id_pesanan_header']: '';

       
        $Status->save();
        return $Status;
    }
}
