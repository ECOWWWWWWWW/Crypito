@extends('layouts.app')

@section('title', 'Markets')

@section('content')
<div class="p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold">Markets</h2>
    </div>

    <div class="grid grid-cols-3 gap-6">
        @foreach($markets as $m)
            <a href="{{ route('markets.show', ['symbol' => $m['symbol'] ?? $m['id'] ?? 'BTC']) }}" class="block p-4 bg-white rounded-lg shadow hover:shadow-md border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-lg font-medium">{{ $m['name'] ?? ($m['symbol'] ?? 'Unknown') }}</div>
                        <div class="text-sm text-gray-500">{{ strtoupper($m['symbol'] ?? ($m['id'] ?? '')) }}</div>
                    </div>
                    <div class="text-right">
                        <div class="text-lg">${{ number_format($m['current_price'] ?? ($m['price'] ?? 0), 2) }}</div>
                        <div class="text-sm {{ (isset($m['price_change_percentage_24h']) && $m['price_change_percentage_24h'] >= 0) ? 'text-green-600' : 'text-red-600' }}">{{ isset($m['price_change_percentage_24h']) ? $m['price_change_percentage_24h'] . '%' : '' }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
