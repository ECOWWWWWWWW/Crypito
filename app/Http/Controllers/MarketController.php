<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CryptoService;

class MarketController extends Controller
{
    /**
     * Show markets list.
     */
    public function index(CryptoService $cryptoService)
    {
        $markets = $cryptoService->getTrendingCryptos(24);

        return view('markets.index', compact('markets'));
    }

    /**
     * Show a single market detail page.
     */
    public function show($symbol, CryptoService $cryptoService)
    {
        $symbol = strtoupper($symbol);
        $pair = $symbol . '/USDT';

        $marketData = $cryptoService->getMarketData($pair);
        $orderBook = $cryptoService->getOrderBook($pair);

        return view('markets.show', compact('symbol', 'marketData', 'orderBook'));
    }
}
