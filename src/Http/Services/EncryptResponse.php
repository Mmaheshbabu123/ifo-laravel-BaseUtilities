<?php

namespace Packages\IfoBaseUtilities\Http\Services;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Packages\IfoBaseUtilities\Http\Controllers\EncryptDecryptController;
use Illuminate\Support\Facades\Log;

class EncryptResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Encrypt the response content
        $encryptedContent = json_encode(EncryptDecryptController::encryptcode($response->getContent()));
        // Set the encrypted content to the response
        $response->setContent($encryptedContent);

        return $response;
    }
}
