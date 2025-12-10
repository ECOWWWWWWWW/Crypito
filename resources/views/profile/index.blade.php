@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Profile</h1>
    <div class="flex flex-col items-center mb-8">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'User') }}&background=0D8ABC&color=fff&size=96" class="w-24 h-24 rounded-full mb-2 border-4 border-blue-200" alt="Avatar">
        <div class="text-lg font-semibold">{{ $user->name ?? 'No Name' }}</div>
        <div class="text-gray-500">{{ $user->email ?? 'No Email' }}</div>
    </div>
    <form class="space-y-4">
        <div>
            <label class="block text-gray-700 mb-1">Full Name</label>
            <input type="text" class="w-full border rounded px-3 py-2" value="{{ $user->name ?? '' }}" readonly>
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" class="w-full border rounded px-3 py-2" value="{{ $user->email ?? '' }}" readonly>
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Phone</label>
            <input type="text" class="w-full border rounded px-3 py-2" value="{{ $user->phone ?? '' }}" readonly>
        </div>
        <button type="button" class="w-full bg-blue-300 text-white py-3 rounded font-semibold cursor-not-allowed" disabled>Save Changes</button>
    </form>
</div>
@endsection
