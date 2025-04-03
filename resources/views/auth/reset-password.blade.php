<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
    
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-semibold"/>
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md text-black" 
                          type="email" name="email" :value="old('email', $request->email)" 
                          required autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>
    
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('New Password')" class="font-semibold"/>
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md text-black" 
                          type="password" name="password" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>
    
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold"/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md text-black" 
                          type="password" name="password_confirmation" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>
    
        <!-- Submit Button -->
        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
    
</x-guest-layout>
