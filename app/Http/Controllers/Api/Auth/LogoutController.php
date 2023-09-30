<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        
        Auth::user()->tokens()->where('id', Auth::user()->currentAccessToken()->id)->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
