<?php

namespace Audit\Providers;

use Audit\Classes\Auditor;
use Carbon\Carbon;
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

    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/../Config/audit.php') => config_path('audit.php'),
            realpath(__DIR__.'/../Migrations/create_audit_table.php') => $this->get_migration_path(),
        ]);
    }

    protected function get_migration_path(){
        $migration_path = database_path('migrations/' . Carbon::now()->format('Y-m-d') . '_000000_create_audit_table.php');
        return str_replace('-', '_', $migration_path);
    }
}
