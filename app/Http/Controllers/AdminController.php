<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Deposit;

class AdminController extends Controller
{
    public function showAdminPage(Request $request)
    {
        $passkey = $request->session()->get('admin_passkey');
        $users = null;
        $deposits = null;
        $error = $request->session()->get('admin_error');
        if ($passkey === 'mary') {
            $users = User::all();
            $deposits = Deposit::with('user')->orderBy('created_at', 'desc')->get();
        }
        // Clear error after showing
        $request->session()->forget('admin_error');
        return view('admin', ['users' => $users, 'deposits' => $deposits, 'error' => $error]);
    }

    public function handlePasskey(Request $request)
    {
        $passkey = $request->input('passkey');
        if ($passkey === 'mary') {
            $request->session()->put('admin_passkey', 'mary');
            $request->session()->forget('admin_error');
        } elseif ($passkey === 'logout') {
            $request->session()->forget('admin_passkey');
            $request->session()->forget('admin_error');
        } else {
            $request->session()->forget('admin_passkey');
            $request->session()->put('admin_error', 'Invalid passkey.');
        }
        return redirect('/admin');
    }
}
