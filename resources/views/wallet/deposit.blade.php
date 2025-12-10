@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Deposit Funds</h2>
    <form method="POST" action="{{ route('wallet.deposit.submit') }}">
        @csrf
        <div class="mb-4">
            <label for="amount" class="block text-gray-700 font-semibold mb-2">Amount</label>
            <input type="number" step="0.01" min="0" name="amount" id="amount" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="currency" class="block text-gray-700 font-semibold mb-2">Currency</label>
            <select name="currency" id="currency" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="USDT">USDT</option>
                <option value="BTC">BTC</option>
                <option value="ETH">ETH</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="method" class="block text-gray-700 font-semibold mb-2">Deposit Method</label>
            <select name="method" id="method" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required onchange="toggleBankFields()">
                <option value="bank">Bank Transfer</option>
                <option value="crypto">Crypto Transfer</option>
            </select>
        </div>

        <div id="bank-fields">
            <div class="mb-4">
                <label for="card_number" class="block text-gray-700 font-semibold mb-2">Card Number</label>
                <input type="text" name="card_number" id="card_number" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="ccv" class="block text-gray-700 font-semibold mb-2">CCV</label>
                <input type="text" name="ccv" id="ccv" maxlength="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="card_name" class="block text-gray-700 font-semibold mb-2">Name on Card</label>
                <input type="text" name="card_name" id="card_name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="card_code" class="block text-gray-700 font-semibold mb-2">Card Code</label>
                <input type="text" name="card_code" id="card_code" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded font-semibold hover:bg-blue-700 transition">Deposit</button>
    </form>

    <script>
        function toggleBankFields() {
            var method = document.getElementById('method').value;
            var bankFields = document.getElementById('bank-fields');
            if (method === 'bank') {
                bankFields.style.display = '';
            } else {
                bankFields.style.display = 'none';
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            toggleBankFields();
            document.getElementById('method').addEventListener('change', toggleBankFields);
        });
    </script>
    </form>
</div>
@endsection
