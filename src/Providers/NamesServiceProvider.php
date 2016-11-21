<?php

namespace Acacha\Names\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class NamesServiceProvider
 * @package Acacha\Names\Providers
 */
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

    /**
     * Bootstrap the application services.
     */
    public function boot() {
        $this->publishMigrations();
    }

    /**
     * Publish migrations
     */
    private function publishMigrations()
    {
        $this->loadMigrationsFrom(NAMES_PATH.'/database/migrations');
    }

}