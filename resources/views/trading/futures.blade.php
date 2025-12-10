@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Futures Trading</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Chart Placeholder -->
        <div class="md:col-span-2">
            <div class="bg-gray-100 rounded-lg h-64 flex items-center justify-center mb-6">
                <span class="text-gray-400">[Futures Chart Placeholder]</span>
            </div>
            <div class="flex gap-4">
                <div class="w-1/2">
                    <h2 class="text-lg font-semibold mb-2">Open Position</h2>
                    <form class="space-y-2">
                        <input type="number" placeholder="Amount" class="w-full border px-3 py-2 rounded" />
                        <input type="number" placeholder="Entry Price" class="w-full border px-3 py-2 rounded" />
                        <select class="w-full border px-3 py-2 rounded">
                            <option>5x Leverage</option>
                            <option>10x Leverage</option>
                            <option>20x Leverage</option>
                        </select>
                        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Open Long</button>
                        <button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Open Short</button>
                    </form>
                </div>
                <div class="w-1/2">
                    <h2 class="text-lg font-semibold mb-2">Positions</h2>
                    <div class="bg-gray-50 rounded-lg p-4 h-40 overflow-y-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr>
                                    <th>Pair</th>
                                    <th>Size</th>
                                    <th>Entry</th>
                                    <th>PnL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>BTC/USDT</td><td>0.2</td><td>$41,800</td><td class="text-green-600">+$120</td></tr>
                                <tr><td>ETH/USDT</td><td>1.5</td><td>$2,200</td><td class="text-red-600">-$30</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order Book -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Order Book</h2>
            <div class="bg-gray-50 rounded-lg p-4 h-64 overflow-y-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr>
                            <th class="text-left">Price</th>
                            <th class="text-left">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td class="text-green-600">$42,000</td><td>0.25 BTC</td></tr>
                        <tr><td class="text-green-600">$41,950</td><td>0.10 BTC</td></tr>
                        <tr><td class="text-green-600">$41,900</td><td>0.50 BTC</td></tr>
                        <tr><td class="text-red-600">$42,050</td><td>0.15 BTC</td></tr>
                        <tr><td class="text-red-600">$42,100</td><td>0.30 BTC</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
