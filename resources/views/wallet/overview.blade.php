@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Wallet Overview</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <div class="bg-blue-50 p-4 rounded-lg text-center">
            <div class="text-gray-500">Total Balance</div>
            <div class="text-2xl font-bold">$12,345.67</div>
        </div>
        <div class="bg-green-50 p-4 rounded-lg text-center">
            <div class="text-gray-500">BTC Balance</div>
            <div class="text-2xl font-bold">0.523 BTC</div>
        </div>
        <div class="bg-yellow-50 p-4 rounded-lg text-center">
            <div class="text-gray-500">ETH Balance</div>
            <div class="text-2xl font-bold">3.14 ETH</div>
        </div>
    </div>
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Recent Activity</h2>
        <table class="w-full text-sm bg-white rounded-lg shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4">Date</th>
                    <th class="py-2 px-4">Type</th>
                    <th class="py-2 px-4">Amount</th>
                    <th class="py-2 px-4">Currency</th>
                </tr>
            </thead>
            <tbody>
                <tr><td class="py-2 px-4">2025-12-10</td><td>Deposit</td><td class="text-green-600">+500</td><td>USDT</td></tr>
                <tr><td class="py-2 px-4">2025-12-09</td><td>Withdraw</td><td class="text-red-600">-0.1</td><td>BTC</td></tr>
                <tr><td class="py-2 px-4">2025-12-08</td><td>Deposit</td><td class="text-green-600">+1.5</td><td>ETH</td></tr>
            </tbody>
        </table>
    </div>
    <div class="flex gap-4">
        <a href="{{ route('wallet.deposit') }}" class="flex-1 bg-blue-600 text-white py-3 rounded text-center font-semibold hover:bg-blue-700">Deposit</a>
        <a href="{{ route('wallet.withdraw') }}" class="flex-1 bg-yellow-500 text-white py-3 rounded text-center font-semibold hover:bg-yellow-600">Withdraw</a>
    </div>
</div>
@endsection
