<?php

namespace Grafite\Commerce\Facades;

use Illuminate\Support\Facades\Facade;

class LogisticServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LogisticService';
    }
}
