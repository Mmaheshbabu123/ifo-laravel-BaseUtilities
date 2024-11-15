<?php

namespace Packages\IfoBaseUtilities\Http\Services;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;
use Throwable;

class Response
{
    public static function processTransaction(callable $callback, int $statusCode = 200)
    {
        try {
            return DB::transaction(function () use ($callback, $statusCode) {
                $response = $callback();
                return self::send($response, $statusCode);
            });
        } catch (Throwable $t) {
            self::throwError($t);
        }
    }


    public static function processRequest(callable $callback, int $statusCode = 200)
    {
        try {
            $response = $callback();
            return self::send($response, $statusCode);
        } catch (Throwable $t) {
            self::throwError($t);
        }
    }


    public static function throwError(Throwable $t, int $statusCode = 400)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    "status" => $statusCode,
                    "error" => $t->getMessage(),
                    "trace" => $t->getTrace()
                ],
                $statusCode
            )
        );
    }

    public static function send($result, $statusCode = 200)
    {
        return response()->json([
            'status' => $statusCode,
            'data' => $result,
        ]);
    }
}
