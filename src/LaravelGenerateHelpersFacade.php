<?php

namespace Limewell\LaravelGenerateHelpers;

use Illuminate\Support\Facades\Facade;

class LaravelGenerateHelpersFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-generate-helpers';
    }
}
