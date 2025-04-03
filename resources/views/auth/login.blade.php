<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
    
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-semibold"/>
            <x-text-input id="email" class="block mt-1 w-full text-black border-gray-300 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>
    
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="font-semibold"/>
            <x-text-input id="password" class="block mt-1 w-full text-black border-gray-300 rounded-md" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>
    
        <!-- Remember Me -->
        <div class="flex items-center mt-4">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
        </div>
    
        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <div class="flex space-x-3">
                <x-primary-button>
                    <a href="{{ route('homePage') }}">{{ __('Home') }}</a>
                </x-primary-button>
                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
    
</x-guest-layout>
