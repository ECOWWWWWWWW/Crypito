@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Spot Trading</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Chart Placeholder -->
        <div class="md:col-span-2">
            <div class="bg-gray-100 rounded-lg h-64 flex items-center justify-center mb-6">
                <span class="text-gray-400">[Trading Chart Placeholder]</span>
            </div>
            <div class="flex gap-4">
                <div class="w-1/2">
                    <h2 class="text-lg font-semibold mb-2">Buy</h2>
                    <form class="space-y-2">
                        <input type="number" placeholder="Amount" class="w-full border px-3 py-2 rounded" />
                        <input type="number" placeholder="Price" class="w-full border px-3 py-2 rounded" />
                        <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Buy</button>
                    </form>
                </div>
                <div class="w-1/2">
                    <h2 class="text-lg font-semibold mb-2">Sell</h2>
                    <form class="space-y-2">
                        <input type="number" placeholder="Amount" class="w-full border px-3 py-2 rounded" />
                        <input type="number" placeholder="Price" class="w-full border px-3 py-2 rounded" />
                        <button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Sell</button>
                    </form>
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
