<?php

namespace Packages\IfoBaseUtilities\Facades;

use Illuminate\Support\Facades\Facade;

class DecryptRequest extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'decryptRequest';
    }
}
