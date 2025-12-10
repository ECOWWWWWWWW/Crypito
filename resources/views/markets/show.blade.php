@extends('layouts.app')

@section('title', $symbol . ' Market')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold">{{ $symbol }} / USDT</h2>
        <div class="text-right">
            <div class="text-xl font-medium">${{ number_format($marketData['price'] ?? 0, 2) }}</div>
            <div class="text-sm text-gray-500">24h: {{ number_format($marketData['change_24h'] ?? 0, 2) }}%</div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-2 bg-white p-4 rounded-lg shadow">
            <h3 class="font-medium mb-4">Market Overview</h3>
            <p>High 24h: ${{ number_format($marketData['high_24h'] ?? 0, 2) }}</p>
            <p>Low 24h: ${{ number_format($marketData['low_24h'] ?? 0, 2) }}</p>
            <p>Volume 24h: {{ number_format($marketData['volume_24h'] ?? 0) }}</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="font-medium mb-4">Order Book (Mock)</h3>
            <div class="space-y-2 max-h-80 overflow-auto">
                <div class="text-sm text-gray-500">Bids</div>
                @foreach($orderBook['bids'] as $b)
                    <div class="flex justify-between text-sm">
                        <div>${{ number_format($b['price'], 6) }}</div>
                        <div>{{ $b['amount'] }}</div>
                    </div>
                @endforeach

                <div class="mt-4 text-sm text-gray-500">Asks</div>
                @foreach($orderBook['asks'] as $a)
                    <div class="flex justify-between text-sm">
                        <div>${{ number_format($a['price'], 6) }}</div>
                        <div>{{ $a['amount'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
