<?php

namespace Packages\IfoBaseUtilities\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EncryptDecryptController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public static $ciphering = "aes256";
    public static $key = "H98zM6i/55yNJfkFsbu0HrzlFo17FtR9";
    public static $options = 0;
    public static $iv;

    //Function to encrypt given data string
    public static function encryptcode($datastring)
    {
        self::$iv = substr(self::$key, 0, 16);
        return openssl_encrypt(
            $datastring,
            self::$ciphering,
            self::$key,
            self::$options,
            self::$iv
        );
    }

    //Function to decrypt given data string
    public static function decryptcode($datastring)
    {
        self::$iv = substr(self::$key, 0, 16);
        return openssl_decrypt(
            $datastring,
            self::$ciphering,
            self::$key,
            self::$options,
            self::$iv
        );
    }

}
