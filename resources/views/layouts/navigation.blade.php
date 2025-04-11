<!-- resources/views/layouts/navigation.blade.php -->
<nav x-data="{ open: false, isVisible: true, lastScroll: 0 }" 
     @scroll.window="let currentScroll = window.pageYOffset; isVisible = currentScroll <= 0 || currentScroll < lastScroll; lastScroll = currentScroll;" 
     :class="{ 'translate-y-0': isVisible, '-translate-y-full': !isVisible }" 
     class="bg-gradient-to-r from-blue-600 to-indigo-600 fixed top-0 w-full shadow-lg z-50 transition-transform duration-300 ease-in-out">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                
                <div class="hidden sm:flex sm:items-center space-x-6">
                    <x-nav-link :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')" 
                        :active="request()->routeIs(Auth::user()->role === 'admin' ? 'admin.dashboard' : 'dashboard')" 
                        class="text-white hover:text-indigo-200 transition duration-200 ease-in-out">
                        <img class="w-17 h-14 rounded-full" src="/image/LOGO RETINA.jpg" alt="Logo">
                    </x-nav-link>
                </div>  
                 
            </div>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden sm:flex sm:items-center space-x-6">
                <x-nav-link :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')" 
                            :active="request()->routeIs(Auth::user()->role === 'admin' ? 'admin.dashboard' : 'dashboard')" 
                            class="text-white hover:text-indigo-200 transition duration-200 ease-in-out">
                    {{ __('Tableau de bord') }}
                </x-nav-link>
            </div>

            <!-- User Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 px-4 py-2 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 focus:outline-none transition duration-200">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="bg-white shadow-lg rounded-lg p-2">
                        <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100 rounded-md">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        @if (Auth::user()->role === 'admin')
                            <x-dropdown-link :href="route('admin.preinscriptions.index')" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100 rounded-md">
                                Gérer les préinscriptions
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('admin.categorie.index')" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100 rounded-md">
                                Gérer les catégories
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('admin.speciality.index')" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100 rounded-md">
                                Gérer les spécialités
                            </x-dropdown-link>
                        @else
                            <x-dropdown-link :href="route('viewPreinscriptionValidation')" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100 rounded-md">
                                Ma fiche de préinscription
                            </x-dropdown-link>
                            
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100 rounded-md">
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="p-2 text-white hover:bg-indigo-700 rounded-md focus:outline-none transition duration-200">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu (Mobile) -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" class="sm:hidden bg-indigo-600 shadow-lg">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')" 
                                   :active="request()->routeIs(Auth::user()->role === 'admin' ? 'admin.dashboard' : 'dashboard')" 
                                   class="block px-4 py-2 text-white hover:bg-indigo-700">
                {{ __('Tableau de bord') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-indigo-500">
            <div class="px-4 text-white">
                <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm opacity-75">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block px-4 py-2 text-white hover:bg-indigo-700">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                @if (Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.preinscriptions.index')" class="block px-4 py-2 text-white hover:bg-indigo-700">
                        Gérer les préinscriptions
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.categorie.index')" class="block px-4 py-2 text-white hover:bg-indigo-700">
                        Gérer les catégories
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.speciality.index')" class="block px-4 py-2 text-white hover:bg-indigo-700">
                        Gérer les spécialités
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('viewPreinscriptionValidation')" class="block px-4 py-2 text-white hover:bg-indigo-700">
                        Ma fiche de préinscription
                    </x-responsive-nav-link>

                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-white hover:bg-indigo-700">
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>


<br>
<br>
<br>
