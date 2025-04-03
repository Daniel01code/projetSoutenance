<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
    
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-semibold"/>
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md text-black" 
                          type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>
    
        <!-- Submit Button -->
        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                {{ __('Send Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>    
</x-guest-layout>
