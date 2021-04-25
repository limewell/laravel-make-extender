<?php

namespace DipeshSukhia\LaravelGenerateHelpers;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DipeshSukhia\LaravelGenerateHelpers\Skeleton\SkeletonClass
 */
class LaravelGenerateHelpersFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-generate-helpers';
    }
}
