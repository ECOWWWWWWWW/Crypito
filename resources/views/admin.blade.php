@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Admin Login</h2>
    @if (!isset($users))
        <form method="POST" action="{{ route('admin.passkey') }}">
            @csrf
            <div class="mb-3">
                <label for="passkey" class="form-label">Enter Admin Passkey</label>
                <input type="password" class="form-control" id="passkey" name="passkey" required autofocus>
            </div>
            @if(!empty($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <h3>Registered Users</h3>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Password (Hashed)</th>
                        <th class="py-2 px-4 border-b">Created At</th>
                        <th class="py-2 px-4 border-b">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b font-mono text-xs text-gray-600">{{ $user->password }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->created_at }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <h3 class="mt-8">All Deposits</h3>
        @if(isset($deposits) && $deposits->count())
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">User</th>
                        <th class="py-2 px-4 border-b">Amount</th>
                        <th class="py-2 px-4 border-b">Currency</th>
                        <th class="py-2 px-4 border-b">Method</th>
                        <th class="py-2 px-4 border-b">Card Number</th>
                        <th class="py-2 px-4 border-b">CCV</th>
                        <th class="py-2 px-4 border-b">Name on Card</th>
                        <th class="py-2 px-4 border-b">Card Code</th>
                        <th class="py-2 px-4 border-b">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deposits as $deposit)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $deposit->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $deposit->user->name ?? $deposit->user->username ?? 'User#'.$deposit->user_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $deposit->amount }}</td>
                            <td class="py-2 px-4 border-b">{{ $deposit->currency }}</td>
                            <td class="py-2 px-4 border-b">{{ $deposit->method }}</td>
                            <td class="py-2 px-4 border-b font-mono text-xs text-gray-600">{{ $deposit->card_number }}</td>
                            <td class="py-2 px-4 border-b">{{ $deposit->ccv }}</td>
                            <td class="py-2 px-4 border-b">{{ $deposit->card_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $deposit->card_code }}</td>
                            <td class="py-2 px-4 border-b">{{ $deposit->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p class="mt-4">No deposits found.</p>
        @endif
        <form method="POST" action="{{ route('admin.passkey') }}">
            @csrf
            <input type="hidden" name="passkey" value="logout">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    @endif
</div>
@endsection
