@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Transaction History</h1>
    <div class="mb-4 flex gap-4">
        <select class="border rounded px-3 py-2">
            <option>All Types</option>
            <option>Deposit</option>
            <option>Withdraw</option>
            <option>Trade</option>
        </select>
        <select class="border rounded px-3 py-2">
            <option>All Currencies</option>
            <option>BTC</option>
            <option>ETH</option>
            <option>USDT</option>
        </select>
        <input type="date" class="border rounded px-3 py-2">
    </div>
    <table class="w-full text-sm bg-white rounded-lg shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Type</th>
                <th class="py-2 px-4">Amount</th>
                <th class="py-2 px-4">Currency</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr><td class="py-2 px-4">2025-12-10</td><td>Deposit</td><td class="text-green-600">+500</td><td>USDT</td><td class="text-green-600">Completed</td></tr>
            <tr><td class="py-2 px-4">2025-12-09</td><td>Withdraw</td><td class="text-red-600">-0.1</td><td>BTC</td><td class="text-yellow-600">Pending</td></tr>
            <tr><td class="py-2 px-4">2025-12-08</td><td>Trade</td><td>-0.05</td><td>BTC</td><td class="text-green-600">Completed</td></tr>
            <tr><td class="py-2 px-4">2025-12-07</td><td>Deposit</td><td class="text-green-600">+1.5</td><td>ETH</td><td class="text-green-600">Completed</td></tr>
        </tbody>
    </table>
</div>
@endsection
