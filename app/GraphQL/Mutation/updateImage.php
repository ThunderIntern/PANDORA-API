<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class updateImage extends Mutation
{
    protected $attributes = [
        'name' => 'updateImage',
        'description' => 'A mutation'
    ];

    public function type()
    {  return GraphQL::type('imageType');
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
        $Image = Image::where('id', $args['id'])->first();
        
            $args['id_barang']? $Image->id_barang = $args['id_barang']: '';
            $args['thumbnail']? $Image->thumbnail = $args['thumbnail']: '';
            $args['image_ori']? $Image->image_ori = $args['image_ori']: '';

            $Image->save();
            return $Image;
    }
    }

