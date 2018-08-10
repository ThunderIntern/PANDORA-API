<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Image;
class createImage extends Mutation
{
    protected $attributes = [
        'name' => 'createImage',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('imageType');
    }

    public function args()
    {
        return [
            'id_barang' => ['name' => 'id_barang', 'type' => Type::Int()],
            'thumbnail' => ['name' => 'thumbnail', 'type' => Type::string()],
           
            'image_ori' => ['name' => 'image_ori', 'type' => Type::string()],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $image = new Image();
        $image->fill($args);
        $image->save();
        return $image;
    }
}
