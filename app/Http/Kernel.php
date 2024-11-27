<?php

protected $middlewareGroups = [
    'web' => [
        // Outros middlewares...
        \App\Http\Middleware\CorsMiddleware::class,
    ],

    'api' => [
        // Outros middlewares...
        \App\Http\Middleware\CorsMiddleware::class,
    ],
];

