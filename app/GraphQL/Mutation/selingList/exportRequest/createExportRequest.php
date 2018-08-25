<?php

namespace App\GraphQL\Mutation\selingList\exportRequest;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\ExportRequest;
class createExportRequest extends Mutation
{
    protected $attributes = [
        'name' => 'createExportRequest',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('exportRequestType');
    }

    public function args()
    {
        return [
         
            
               
            'user_id' => [
                'type' => Type::string()
            ],
            'target'=>[
                'type'=> Type::string()
            ],
            
        ] ;   
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $export = new ExportRequest();
        $export->fill($args);
        $export->save();
        return $export;
    }
}
