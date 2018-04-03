<?php

namespace Audit\Providers;

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

    public function boot(){
        $this->publishes([
            __DIR__.'/../config/audit.php' => config_path('audit.php'),
            __DIR__.'/../migrations/create_audit_table.php' => database_path('create_audit_table.php')
        ]);
    }
}
