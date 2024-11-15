<?php

namespace Packages\IfoBaseUtilities\Facades;

use Illuminate\Support\Facades\Facade;

class AbstractModel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'abstractModel';
    }
}