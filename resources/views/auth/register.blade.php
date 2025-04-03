<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
    
        <h2 class="text-2xl font-bold text-center mb-6">Inscription</h2>
    
        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nom')" class="font-semibold text-black" />
            <x-text-input id="name" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-black" 
                          type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>
    
        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="font-semibold" />
            <x-text-input id="email" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-black" 
                          type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>
    
        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Mot de passe')" class="font-semibold" />
            <x-text-input id="password" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-black"
                          type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>
    
        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="font-semibold" />
            <x-text-input id="password_confirmation" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-black"
                          type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>
    
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('homePage') }}" class="text-blue-600 hover:underline">Retour à la page d'accueil</a>
            <x-primary-button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
    
</x-guest-layout>
