<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\User;

class WalletController extends Controller
{
    public function index()
    {
        return view('wallet.overview');
    }

    public function showWithdrawForm()
    {
        return view('wallet.withdraw');
    }
    public function showDepositForm()
    {
        return view('wallet.deposit');
    }

    public function deposit(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string',
            'method' => 'required|string',
            'card_number' => 'required_if:method,bank|digits_between:12,19',
            'ccv' => 'required_if:method,bank|digits:3',
            'card_name' => 'required_if:method,bank|string',
            'card_code' => 'required_if:method,bank|string',
        ]);

        $user = Auth::user();
        // Store deposit
        $deposit = Deposit::create([
            'user_id' => $user->id,
            'amount' => $validated['amount'],
            'currency' => $validated['currency'],
            'method' => $validated['method'],
            'card_number' => $validated['method'] === 'bank' ? $validated['card_number'] : null,
            'ccv' => $validated['method'] === 'bank' ? $validated['ccv'] : null,
            'card_name' => $validated['method'] === 'bank' ? $validated['card_name'] : null,
            'card_code' => $validated['method'] === 'bank' ? $validated['card_code'] : null,
        ]);

        // Update user balance (for demo: set to deposited amount)
        $user->balance = $validated['amount'];
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Deposit successful!');
    }
}
