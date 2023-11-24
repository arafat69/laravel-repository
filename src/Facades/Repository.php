<?php

namespace Arafat\LaravelRepository\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Arafat\LaravelRepository\Repository
 */
class Repository extends Facade{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-repository';
    }
}

