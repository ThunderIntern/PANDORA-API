<?php

namespace App\GraphQL\Mutation\selingList\exportRequest;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\ExportRequest;
class deleteExportRequest extends Mutation
{
    protected $attributes = [
        'name' => 'deleteExportRequest',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('pricingType');
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
        $export->delete();
        return $export;
    }
}
