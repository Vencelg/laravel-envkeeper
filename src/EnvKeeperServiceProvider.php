<?php

declare(strict_types=1);

namespace Vencelg\EnvKeeper;

use Illuminate\Support\ServiceProvider;

class EnvKeeperServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/env.base.php',
            'envkeeper'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/env.base.php' => config_path('envkeeper/env.base.php'),
        ], 'envkeeper-config');
    }
}
