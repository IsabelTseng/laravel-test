<?php

namespace App\Ylc\Facades;

use Illuminate\Support\Facades\Facade;

class YlcAuth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \App\Ylc\Auth\YlcOpenId::class;
    }
}
