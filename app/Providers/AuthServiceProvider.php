<?php

namespace App\Providers;

use App\Providers\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Folklore\GraphQL\Error\AuthorizationError;

use Firebase\JWT\JWT;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            
            // Get Token
            $token = substr($request->header('authorization'), strlen('Bearer '));

            if ($token)
            {
                // Validate
                $jwt = JWT::decode($token, env('JWT_KEY'), ['HS256']);
                if ($jwt->iss !== env('JWT_ISS')) return null;
                if ($jwt->aud !== env('JWT_AUD')) return null;
                if (!$user = User::username($jwt->user_id)->first()) return null;

                return $user;
            }

            return null;
        });
    }
}
