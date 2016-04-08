<?php

$api = $app->make('Dingo\Api\Routing\Router');

$api->version(['v1'], function ($api) use ($app) {
    $api->get('/', function () use ($app, $api) {
        return [
            'message' => $app->version(),
            'status' => 200,
        ];
    });

    $api->post('/auth/login', 'App\Api\v1\AuthController@postLogin');

    $api->get('/user', ['middleware' => 'api.auth', function () {
        $user = JWTAuth::parseToken()->authenticate();

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }]);
});
