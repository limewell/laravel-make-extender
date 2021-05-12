<?php

namespace Limewell\LaravelMakeExtender;

use Illuminate\Support\Facades\Facade;

class LaravelMakeExtenderFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-make-extender';
    }
}
