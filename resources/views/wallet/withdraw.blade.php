@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Withdraw Funds</h1>
    <form class="mb-8">
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Select Currency</label>
            <select class="w-full border rounded px-3 py-2">
                <option>BTC</option>
                <option>ETH</option>
                <option>USDT</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Amount</label>
            <input type="number" class="w-full border rounded px-3 py-2" placeholder="Enter amount">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Destination Address</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Wallet address">
        </div>
        <button type="submit" class="w-full bg-yellow-500 text-white py-3 rounded font-semibold hover:bg-yellow-600">Withdraw</button>
    </form>
    <h2 class="text-xl font-semibold mb-2">Recent Withdrawals</h2>
    <table class="w-full text-sm bg-white rounded-lg shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Amount</th>
                <th class="py-2 px-4">Currency</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr><td class="py-2 px-4">2025-12-09</td><td>-0.1</td><td>BTC</td><td class="text-yellow-600">Pending</td></tr>
            <tr><td class="py-2 px-4">2025-12-07</td><td>-2.0</td><td>ETH</td><td class="text-green-600">Completed</td></tr>
        </tbody>
    </table>
</div>
@endsection
