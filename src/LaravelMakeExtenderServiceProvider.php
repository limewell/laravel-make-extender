<?php

namespace Limewell\LaravelMakeExtender;

use Limewell\LaravelMakeExtender\Console\Commands\{
    MakeHelperCommand,
    MakeServiceCommand,
    MakeTraitCommand,
    MakeScopeCommand,
    MakeCastCommand,
    MakeMacroCommand
};
use Illuminate\Support\ServiceProvider;

class LaravelMakeExtenderServiceProvider extends ServiceProvider
{
    /**
     * @param $dir
     * @param array $files
     * @return array
     */
    private function getIncludes($dir, array &$files = []): array
    {
        if (is_dir($dir)) {
            foreach (scandir($dir) as $inode) {
                $path = realpath($dir . DIRECTORY_SEPARATOR . $inode);
                if (!is_dir($path)) {
                    !(pathinfo($path, PATHINFO_EXTENSION) === "php") ?: array_push($files, $path);
                } elseif (!in_array($inode, [".", ".."])) {
                    self::getIncludes($path, $files);
                }
            }
        }
        return $files;
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * include helpers
         * */
        array_map(function ($helper) {
            require_once($helper);
        }, self::getIncludes(app_path('Helpers')));

        /*
         * include macros
         * */
        array_map(function ($helper) {
            require_once($helper);
        }, self::getIncludes(app_path('Macros')));

        if ($this->app->runningInConsole()) {
            // Publishing the stub files.
            $this->publishes([
                __DIR__ . '/../stubs' => base_path('stubs/vendor/laravel-make-extender'),
            ], 'stubs');

            // Registering package commands.
            $this->commands([
                MakeHelperCommand::class,
                MakeServiceCommand::class,
                MakeTraitCommand::class,
                MakeScopeCommand::class,
                MakeMacroCommand::class,
                MakeCastCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-make-extender');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-make-extender', function () {
            return new LaravelMakeExtender;
        });
    }
}
