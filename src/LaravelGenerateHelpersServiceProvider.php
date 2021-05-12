<?php

namespace Limewell\LaravelGenerateHelpers;

use Limewell\LaravelGenerateHelpers\Console\Commands\{MakeHelperCommand,
    MakeScopeCommand,
    MakeServiceCommand,
    MakeTraitCommand
};
use Illuminate\Support\ServiceProvider;

class LaravelGenerateHelpersServiceProvider extends ServiceProvider
{
    /**
     * @param $dir
     * @param array $helpers
     * @return array
     */
    private function getHelpers($dir, array &$helpers = []): array
    {
        if (is_dir($dir)) {
            foreach (scandir($dir) as $inode) {
                $path = realpath($dir . DIRECTORY_SEPARATOR . $inode);
                if (!is_dir($path)) {
                    !(pathinfo($path, PATHINFO_EXTENSION) === "php") ?: array_push($helpers, $path);
                } elseif (!in_array($inode, [".", ".."])) {
                    self::getHelpers($path, $helpers);
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
        array_map(function ($helper) {
            require_once($helper);
        }, self::getHelpers(app_path('Helpers')));

        if ($this->app->runningInConsole()) {
            // Publishing the stub files.
            $this->publishes([
                __DIR__ . '/../stubs' => base_path('stubs/vendor/laravel-generate-helpers'),
            ], 'stubs');

            // Registering package commands.
            $this->commands([
                MakeHelperCommand::class,
                MakeServiceCommand::class,
                MakeTraitCommand::class,
                MakeScopeCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-generate-helpers');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-generate-helpers', function () {
            return new LaravelGenerateHelpers;
        });
    }
}
