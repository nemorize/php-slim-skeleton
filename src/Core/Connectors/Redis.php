<?php

namespace App\Core\Connectors;

use App\Application;
use Predis\Client as RedisClient;

class Redis extends RedisClient
{
    /**
     * Constructor.
     */
    public function __construct ()
    {
        $redisDsn = Application::get('env:REDIS_DSN');
        if ($redisDsn === null) {
            return;
        }
        parent::__construct($redisDsn);
    }
}