<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Providers\Models\User;
class cekUser extends Mutation
{
    protected $attributes = [
        'name' => 'cekUser',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('User'));
    }

    public function args()
    {
        return [
            
            'username'  => ['name' => 'username',   'type' => Type::string()],
           
        ];
    }

    public function resolve($root, $args)
    {
        $user   = User::where('username','=',$args['username'])->first();

        if ($user==true) {
           return true;
            
        }

        

        return false;
    }
}