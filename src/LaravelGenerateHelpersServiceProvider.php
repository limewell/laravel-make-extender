<?php

namespace DipeshSukhia\LaravelGenerateHelpers;

use DipeshSukhia\LaravelGenerateHelpers\Commands\GenerateHelper;
use DipeshSukhia\LaravelGenerateHelpers\Commands\GenerateService;
use DipeshSukhia\LaravelGenerateHelpers\Commands\GenerateTrait;
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
            // Registering package commands.
            $this->commands([
                GenerateHelper::class,
                GenerateService::class,
                GenerateTrait::class,
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
