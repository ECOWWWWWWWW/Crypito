<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Show the forgot password form.
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send password reset link.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors(['email' => __('We can\'t find a user with that email address.')]);
        }

        // Generate a raw token
        $token = Str::random(64);

        // Store the SHA256 of the token in the password_reset_tokens table
        // (Laravel compares: DB token = sha256(rawToken) from the URL)
        $table = config('auth.passwords.' . config('auth.defaults.passwords') . '.table', 'password_reset_tokens');
        
        DB::table($table)->updateOrInsert(
            ['email' => $user->email],
            ['token' => hash('sha256', $token), 'created_at' => now()]
        );

        // Redirect to the reset form with the raw token and email
        // The reset form will show and allow the user to enter a new password
        return redirect()->route('password.reset', ['token' => $token, 'email' => $user->email]);
    }

    /**
     * Show the password reset form.
     */
    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Handle password reset.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $table = config('auth.passwords.' . config('auth.defaults.passwords') . '.table', 'password_reset_tokens');
        
        // Find the reset record
        $record = DB::table($table)
            ->where('email', $request->email)
            ->first();

        if (! $record) {
            return back()->withErrors(['email' => [__('auth.invalid')]]);
        }

        // Verify the token matches (compare SHA256 of the provided token with stored token)
        if (! hash_equals($record->token, hash('sha256', $request->token))) {
            return back()->withErrors(['email' => [__('auth.invalid')]]);
        }

        // Check if token is expired (60 minutes default from config)
        $expiry = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire', 60) * 60;
        if ($record->created_at && now()->diffInSeconds($record->created_at) > $expiry) {
            DB::table($table)->where('email', $request->email)->delete();
            return back()->withErrors(['email' => [__('auth.token_expired')]]);
        }

        // Find user and update password
        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return back()->withErrors(['email' => [__('auth.invalid')]]);
        }

        // Update the password
        $user->forceFill([
            'password' => Hash::make($request->password)
        ])->setRememberToken(Str::random(60));
        
        $user->save();

        // Delete the used token
        DB::table($table)->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', __('Password reset successfully. Please log in.'));
    }
}
