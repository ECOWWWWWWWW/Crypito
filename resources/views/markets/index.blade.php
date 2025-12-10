@extends('layouts.app')

@section('title', 'Markets')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Markets</h1>
    <div class="mb-4 flex justify-between items-center">
        <input type="text" class="border rounded px-3 py-2 w-64" placeholder="Search markets...">
        <span class="text-gray-500">Last updated: 2s ago</span>
    </div>
    <table class="w-full text-sm bg-white rounded-lg shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left">Pair</th>
                <th class="py-2 px-4 text-right">Last Price</th>
                <th class="py-2 px-4 text-right">24h Change</th>
                <th class="py-2 px-4 text-right">24h Volume</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 font-semibold">BTC/USDT</td>
                <td class="py-2 px-4 text-right">$42,100.00</td>
                <td class="py-2 px-4 text-right text-green-600">+2.15%</td>
                <td class="py-2 px-4 text-right">1,234 BTC</td>
            </tr>
            <tr>
                <td class="py-2 px-4 font-semibold">ETH/USDT</td>
                <td class="py-2 px-4 text-right">$2,350.50</td>
                <td class="py-2 px-4 text-right text-red-600">-0.87%</td>
                <td class="py-2 px-4 text-right">8,900 ETH</td>
            </tr>
            <tr>
                <td class="py-2 px-4 font-semibold">SOL/USDT</td>
                <td class="py-2 px-4 text-right">$98.20</td>
                <td class="py-2 px-4 text-right text-green-600">+5.02%</td>
                <td class="py-2 px-4 text-right">32,000 SOL</td>
            </tr>
            <tr>
                <td class="py-2 px-4 font-semibold">XRP/USDT</td>
                <td class="py-2 px-4 text-right">$0.62</td>
                <td class="py-2 px-4 text-right text-green-600">+1.10%</td>
                <td class="py-2 px-4 text-right">120,000,000 XRP</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
