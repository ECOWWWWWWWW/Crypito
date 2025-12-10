@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">KYC Verification</h1>
    <div class="mb-6">
        <div class="flex items-center gap-2 mb-2">
            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Pending</span>
            <span class="text-gray-500 text-sm">Your documents are under review.</span>
        </div>
        <p class="text-gray-600">To comply with regulations, please upload your identity documents.</p>
    </div>
    <form class="space-y-4 mb-8">
        <div>
            <label class="block text-gray-700 mb-1">Full Name</label>
            <input type="text" class="w-full border rounded px-3 py-2" value="James Doe">
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Document Type</label>
            <select class="w-full border rounded px-3 py-2">
                <option>ID Card</option>
                <option>Passport</option>
                <option>Driver's License</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Upload Document</label>
            <input type="file" class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded font-semibold hover:bg-blue-700">Submit for Review</button>
    </form>
    <div class="text-gray-500 text-sm">We value your privacy. Your information is securely stored and never shared.</div>
</div>
@endsection
