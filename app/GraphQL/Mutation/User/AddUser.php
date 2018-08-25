<?php

namespace App\GraphQL\Mutation\User;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Providers\Models\User;

class AddUser extends Mutation
{
    protected $attributes = [
        'name' => 'AddUser'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'nama'      => ['name' => 'nama',       'type' => Type::string()],
            'username'  => ['name' => 'username',   'type' => Type::string()],
            'password'  => ['name' => 'password',   'type' => Type::string()]
        ];
    }

    public function resolve($root, $args)
    {
        $user   = User::username($args['username'])->first();

        if ($user) {
            throw new \Exception("User Exists", 999);
            
        }

        $user   = new User;
        $user->username     = $args['username'];
        $user->nama         = $args['nama'];
        $user->password     = $args['password'];
        $user->save();

        return $user;
    }
}