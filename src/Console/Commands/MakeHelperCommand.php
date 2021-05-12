<?php

namespace Limewell\LaravelGenerateHelpers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class MakeHelperCommand extends GeneratorCommand
{
    protected $name = 'make:helper';

    protected $description = 'Create a new helper';

    protected $type = 'Helper';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        if (file_exists($stubPath = base_path("stubs/vendor/laravel-generate-helpers/helper.php.stub"))) {
            return $stubPath;
        } else {
            return __DIR__ . "/../../../stubs/helper.php.stub";
        }
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Helpers';
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
