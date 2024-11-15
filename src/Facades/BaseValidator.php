<?php

namespace Packages\IfoBaseUtilities\Facades;

use Illuminate\Support\Facades\Facade;

class BaseValidator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'baseValidator';
    }
}
