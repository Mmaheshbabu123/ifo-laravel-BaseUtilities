<?php

namespace Packages\IfoBaseUtilities\Facades;

use Illuminate\Support\Facades\Facade;

class AbstractApiService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'abstractApiService';
    }
}
