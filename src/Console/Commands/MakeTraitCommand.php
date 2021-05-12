<?php

namespace Limewell\LaravelGenerateHelpers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class MakeTraitCommand extends GeneratorCommand
{
    protected $name = 'make:trait';

    protected $description = 'Create a new trait';

    protected $type = 'Trait';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        if (file_exists($stubPath = base_path("stubs/vendor/laravel-generate-helpers/trait.stub"))) {
            return $stubPath;
        } else {
            return __DIR__ . "/../../../stubs/trait.php.stub";
        }
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Traits';
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
