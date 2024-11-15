<?php

namespace Packages\IfoBaseUtilities\Facades;

use Illuminate\Support\Facades\Facade;

class HasNotDeletedScope extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'hasNotDeletedScope';
    }
}
