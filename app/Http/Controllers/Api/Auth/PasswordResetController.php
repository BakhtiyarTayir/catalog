<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        $response = Password::sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
                    ? response()->json(['message' => 'Reset link sent to your email.'], 200)
                    : response()->json(['message' => 'Unable to send reset link'], 500);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill(['password' => bcrypt($password)])->save();
            }
        );

        return $response == Password::PASSWORD_RESET
                    ? response()->json(['message' => 'Password has been reset.'], 200)
                    : response()->json(['message' => 'Unable to reset password'], 500);
    }
}
