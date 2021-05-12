<?php

namespace Limewell\LaravelMakeExtender\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class MakeScopeCommand extends GeneratorCommand
{
    protected $name = 'make:scope';

    protected $description = 'Create a new scope';

    protected $type = 'Scope';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        if (file_exists($stubPath = base_path("stubs/vendor/laravel-make-extender/scope.php.stub"))) {
            return $stubPath;
        } else {
            return __DIR__ . "/../../../stubs/scope.php.stub";
        }
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Scopes';
    }

    /**
     * @return bool
     * @throws FileNotFoundException
     */
    public function handle(): bool
    {
        $handle = parent::handle();

        if ($handle === false) {
            return false;
        }

        return true;
    }
}
