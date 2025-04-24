<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        // remove the token from the blacklist
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        // if the token was invalidated successfully
        if ($removeToken) {
            // return a success response JSON
            return response()->json([
                'status' => true,
                'message' => 'Logout Berhasil!',
            ]);
        }
    }
}
