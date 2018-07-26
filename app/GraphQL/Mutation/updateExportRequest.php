<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\ExportRequest;
class updateExportRequest extends Mutation
{
    protected $attributes = [
        'name' => 'updateExportRequest',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('exportRequestType');
       }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
               
            'user_id' => [
                'type' => Type::string()
            ],
            'target'=>[
                'type'=> Type::string()
            ],
        
          
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $export = ExportRequest::where('id', $args['id'])->first();
        $args['user_id']? $export->user_id = $args['user_id']: '';
        $args['target']? $export->target = $args['target']: '';
       
       
        $export->save();
        return $export;
    }
}
