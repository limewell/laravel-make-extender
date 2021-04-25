<?php

namespace DipeshSukhia\LaravelGenerateHelpers;

use DipeshSukhia\LaravelGenerateHelpers\Commands\GenerateHelper;
use Illuminate\Support\ServiceProvider;

class LaravelGenerateHelpersServiceProvider extends ServiceProvider
{
    private function getHelpers($dir, &$helpers = [])
    {
        if(is_dir($dir)) {
            foreach (scandir($dir) as $inode) {
                $path = realpath($dir . DIRECTORY_SEPARATOR . $inode);
                if (!is_dir($path)) {
                    !(pathinfo($path, PATHINFO_EXTENSION) === "php") ? : array_push($helpers, $path);
                } elseif (!in_array($inode, [".", ".."])) {
                    Self::getHelpers($path, $helpers);
                }
            }
        }
        return $helpers;
    }
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        array_map(function($helper){
            require_once($helper);
        },Self::getHelpers(app_path('Helpers')));
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-generate-helpers');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-generate-helpers');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            /*$this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-generate-helpers.php'),
            ], 'config');*/

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-generate-helpers'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-generate-helpers'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-generate-helpers'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                GenerateHelper::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-generate-helpers');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-generate-helpers', function () {
            return new LaravelGenerateHelpers;
        });
    }
}
