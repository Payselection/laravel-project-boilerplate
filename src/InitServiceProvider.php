<?php

namespace Payselection\Boilerplate;

use Illuminate\Support\ServiceProvider;

class InitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../files' => base_path(),
            ], 'payselection-files');
        }
    }
}
