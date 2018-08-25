<?php

namespace App\GraphQL\Mutation\warehouse\image;;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Image;
class deleteImage extends Mutation
{
    protected $attributes = [
        'name' => 'deleteImage',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('imageType');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::Int())
            ],
            'id_barang' => ['name' => 'id_barang', 'type' => Type::Int()],
            'thumbnail' => ['name' => 'thumbnail', 'type' => Type::string()],
           
            'image_ori' => ['name' => 'image_ori', 'type' => Type::string()],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $image = Image::where('id', $args['id'])->first();
        $image->delete();
        return $image;
    }
}
