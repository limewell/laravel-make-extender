<?php

namespace DipeshSukhia\LaravelGenerateHelpers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class MakeServiceCommand extends GeneratorCommand
{
    protected $name = 'make:service';

    protected $description = 'Create a new service class';

    protected $type = 'Service';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        if (file_exists($stubPath = base_path("stubs/vendor/laravel-generate-helpers/service.php.stub"))) {
            return $stubPath;
        } else {
            return __DIR__ . "/../../../stubs/service.php.stub";
        }
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
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
