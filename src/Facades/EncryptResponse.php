<?php
namespace Packages\IfoBaseUtilities\Facades;

use Illuminate\Support\Facades\Facade;

class EncryptResponse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'encryptResponse';
    }
}
