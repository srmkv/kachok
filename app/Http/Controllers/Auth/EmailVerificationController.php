<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $user = User::where('email_verification_token', $request->route('token'))->first();

        if ($user) {
            $user->update([
                'email_verified_at' => now(),
                'email_verification_token' => null,
            ]);

            return redirect()->route('login')->with('success', 'Email verified successfully.');
        }

        return redirect()->route('login')->with('error', 'Invalid verification token.');
    }
}
