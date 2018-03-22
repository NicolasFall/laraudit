<?php

namespace App\Providers;

use Audit\Classes\Auditor;
use Illuminate\Support\ServiceProvider;

class AuditServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Auditor::class, function ($app) {
            return new Auditor();
        });
    }
}
