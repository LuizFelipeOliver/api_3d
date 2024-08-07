<?php
return [

/*
|--------------------------------------------------------------------------
| Global Middleware
|--------------------------------------------------------------------------
|
| Global middleware is run during every request to your application. These
| middleware are executed in the order listed below. If you would like to
| change the order, you should rearrange this array's values.
|
*/

'global' => [
    // Outros middlewares...
    \App\Http\Middleware\CorsMiddleware::class,
],

// ...

];
