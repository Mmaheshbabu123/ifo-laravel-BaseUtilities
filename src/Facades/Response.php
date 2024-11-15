<?php

namespace Packages\IfoBaseUtilities\Facades;

use Illuminate\Support\Facades\Facade;

class Response extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'responseService';
    }
}
