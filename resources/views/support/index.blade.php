@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded shadow text-center">
        <h1 class="text-3xl font-bold mb-6">Support</h1>
        <form class="mb-8 space-y-4">
            <div>
                <label class="block text-gray-700 mb-1">Subject</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Subject">
            </div>
            <div>
                <label class="block text-gray-700 mb-1">Message</label>
                <textarea class="w-full border rounded px-3 py-2" rows="4" placeholder="Describe your issue..."></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded font-semibold hover:bg-blue-700">Send Message</button>
        </form>
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Frequently Asked Questions</h2>
            <ul class="space-y-2 text-sm">
                <li><span class="font-semibold">How do I reset my password?</span> Go to Security &gt; Change Password.</li>
                <li><span class="font-semibold">How long do withdrawals take?</span> Withdrawals are processed within 24 hours.</li>
                <li><span class="font-semibold">Where can I check my KYC status?</span> Visit the KYC page in your dashboard.</li>
            </ul>
        </div>
</div>
@endsection
