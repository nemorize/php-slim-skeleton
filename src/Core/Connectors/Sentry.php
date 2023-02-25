<?php

namespace App\Core\Connectors;

use App\Application;
use Sentry\ClientBuilder;
use Sentry\State\Hub;
use Throwable;

class Sentry
{
    private ?Hub $sentryHub = null;

    /**
     * Constructor.
     */
    public function __construct ()
    {
        $sentryDsn = Application::get('env:SENTRY_DSN');
        if ($sentryDsn === null) {
            return;
        }

        $this->sentryHub = new Hub();
        $this->sentryHub->bindClient(ClientBuilder::create([ 'dsn' => $sentryDsn, ])->getClient());
    }

    public function captureException(Throwable $exception): void
    {
        if ($this->sentryHub === null) {
            return;
        }

        $this->sentryHub->captureException($exception);
    }
}