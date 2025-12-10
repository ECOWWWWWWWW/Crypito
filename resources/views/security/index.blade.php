@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Security Settings</h1>
    <div class="mb-8">
        <h2 class="text-lg font-semibold mb-2">Two-Factor Authentication (2FA)</h2>
        <div class="flex items-center gap-4 mb-2">
            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Enabled</span>
            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Disable</button>
        </div>
        <p class="text-gray-500 text-sm">Protect your account with an extra layer of security.</p>
    </div>
    <div class="mb-8">
        <h2 class="text-lg font-semibold mb-2">Change Password</h2>
        <form class="space-y-2">
            <input type="password" class="w-full border rounded px-3 py-2" placeholder="Current Password">
            <input type="password" class="w-full border rounded px-3 py-2" placeholder="New Password">
            <input type="password" class="w-full border rounded px-3 py-2" placeholder="Confirm New Password">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700">Update Password</button>
        </form>
    </div>
    <div>
        <h2 class="text-lg font-semibold mb-2">Device Management</h2>
        <table class="w-full text-sm bg-white rounded-lg shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4">Device</th>
                    <th class="py-2 px-4">Location</th>
                    <th class="py-2 px-4">Last Active</th>
                    <th class="py-2 px-4">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr><td class="py-2 px-4">Windows PC</td><td>New York, USA</td><td>2025-12-10 12:34</td><td><button class="text-red-500 hover:underline">Remove</button></td></tr>
                <tr><td class="py-2 px-4">iPhone 14</td><td>San Francisco, USA</td><td>2025-12-09 08:21</td><td><button class="text-red-500 hover:underline">Remove</button></td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
