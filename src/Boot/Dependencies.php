<?php

use App\Core\Connectors\DB;
use App\Core\Connectors\Redis;
use App\Core\Connectors\Sentry;
use App\Middlewares\Core\CorsMiddleware;
use App\Middlewares\Core\TrailingSlashesMiddleware;

return [
    /**
     * Application middlewares.
     * Middlewares should implement Psr\Http\Server\MiddlewareInterface.
     */
    'app:middlewares' => [
        TrailingSlashesMiddleware::class,
        CorsMiddleware::class
    ],

    'app:connectors' => [
        DB::class,
        Sentry::class,
        Redis::class
    ]
];