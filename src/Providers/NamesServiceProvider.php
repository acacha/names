<?php

namespace Acacha\Names\Providers;

use Illuminate\Support\ServiceProvider;

class NamesServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register() {
        if (!defined('NAMES_PATH')) {
            define('NAMES_PATH', realpath(__DIR__.'/../../'));
        }
    }

    public function boot() {
        $this->publishMigrations();
    }

    private function publishMigrations()
    {
        $this->loadMigrationsFrom('NAMES_PATH'.'/database/migrations');
    }

}