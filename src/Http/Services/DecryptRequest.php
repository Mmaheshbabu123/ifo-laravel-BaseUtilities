<?php

namespace Packages\IfoBaseUtilities\Http\Services;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Packages\IfoBaseUtilities\Http\Controllers\EncryptDecryptController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class DecryptRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request !== null) {
            $input = $request->all();

            //for decrypting request data, converting to array and replacing in request
            $decrypteddata = json_decode(EncryptDecryptController::decryptcode(json_encode($input)));
            $decryptedarr = !empty($input) ? json_decode(json_encode($decrypteddata), true) : [];

            // Assign user information to session to use it in the application 
            session([
                'userId' => $decryptedarr['userId'] ?? null
            ]);

            $request->replace($decryptedarr);
        } else {
            $message = json_encode(['status' => 400, 'message' => 'Please provide valid data.']);
            return response($message);
        }
        return $next($request);
    }
}
