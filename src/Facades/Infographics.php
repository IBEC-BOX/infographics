<?php

namespace AdminKit\Infographics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AdminKit\Infographics\Infographics
 */
class Infographics extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AdminKit\Infographics\Infographics::class;
    }
}
