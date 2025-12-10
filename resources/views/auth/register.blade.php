<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign Up - Crypto Exchange</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-3xl text-gray-900 mb-2">🔷 CryptoEx</h1>
                <p class="text-gray-600">Create your account</p>
            </div>

            <!-- Registration Form -->
            <form id="registerForm" action="{{ route('register') }}" method="POST" class="space-y-4" novalidate>
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-gray-700 mb-2">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        value="{{ old('username') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Choose a username"
                        required minlength="3" maxlength="30" pattern="[A-Za-z0-9]+"
                    >
                    @if($errors->has('username'))
                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('username') }}</p>
                    @endif
                    <p class="text-red-600 text-sm mt-1 hidden" id="usernameError"></p>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your email"
                        required
                    >
                    @if($errors->has('email'))
                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('email') }}</p>
                    @endif
                    <p class="text-red-600 text-sm mt-1 hidden" id="emailError"></p>
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        value="{{ old('phone') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your phone number"
                        required pattern="^\+?[0-9]{7,15}$"
                    >
                    @if($errors->has('phone'))
                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('phone') }}</p>
                    @endif
                    <p class="text-red-600 text-sm mt-1 hidden" id="phoneError"></p>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Create a password"
                        required minlength="8"
                    >
                    @if($errors->has('password'))
                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('password') }}</p>
                    @endif
                    <p class="text-red-600 text-sm mt-1 hidden" id="passwordError"></p>
                </div>

                <!-- Terms Checkbox -->
                <div>
                    <label class="flex items-start gap-2">
                        <input type="checkbox" id="terms" name="terms" class="mt-1 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-gray-700 text-sm">
                            I agree to the Terms of Service and Privacy Policy
                        </span>
                    </label>
                    @if($errors->has('terms'))
                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('terms') }}</p>
                    @endif
                    <p class="text-red-600 text-sm mt-1 hidden" id="termsError"></p>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl"
                >
                    Create Account
                </button>
            </form>

            <script>
                (function(){
                    const form = document.getElementById('registerForm');
                    const username = document.getElementById('username');
                    const email = document.getElementById('email');
                    const phone = document.getElementById('phone');
                    const password = document.getElementById('password');
                    const terms = document.getElementById('terms');

                    function showError(elId, message){
                        const el = document.getElementById(elId);
                        if(!el) return;
                        el.textContent = message;
                        el.classList.remove('hidden');
                    }

                    function clearError(elId){
                        const el = document.getElementById(elId);
                        if(!el) return;
                        el.textContent = '';
                        el.classList.add('hidden');
                    }

                    form.addEventListener('submit', function(e){
                        let valid = true;
                        // clear previous
                        ['usernameError','emailError','phoneError','passwordError','termsError'].forEach(clearError);

                        if(!username.value || username.value.length < 3 || !/^[A-Za-z0-9]+$/.test(username.value)){
                            showError('usernameError','Username must be 3-30 characters and alphanumeric.');
                            valid = false;
                        }

                        if(!email.value || !/^\S+@\S+\.\S+$/.test(email.value)){
                            showError('emailError','Please enter a valid email address.');
                            valid = false;
                        }

                        if(!phone.value || !/^\+?[0-9]{7,15}$/.test(phone.value)){
                            showError('phoneError','Enter a valid phone number (7-15 digits, optional leading +).');
                            valid = false;
                        }

                        if(!password.value || password.value.length < 8){
                            showError('passwordError','Password must be at least 8 characters.');
                            valid = false;
                        }

                        if(!terms.checked){
                            showError('termsError','You must accept the Terms of Service.');
                            valid = false;
                        }

                        if(!valid){
                            e.preventDefault();
                            return false;
                        }
                    });
                })();
            </script>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-4 bg-white text-gray-500">Or</span>
                </div>
            </div>

            <!-- Sign In Link -->
            <div class="text-center">
                <p class="text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700">
                        Sign in
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 text-white text-sm">
            <p>&copy; 2024 CryptoEx. All rights reserved.</p>
            <p class="mt-2 text-white/80">Demo platform - Not for real cryptocurrency trading</p>
        </div>
    </div>
</body>
</html>
