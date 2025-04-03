<!-- resources/views/layouts/guest.blade.php ou welcome.blade.php -->
<x-guest-layout>
    <!-- Conteneur principal avec image de fond -->
    <div class="relative min-h-screen">
        <!-- Image de fond -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/image/image.png');"></div>
        <div class="absolute inset-0 bg-gray-900 opacity-60"></div> <!-- Opacité sombre pour lisibilité -->

        <!-- Contenu principal -->
        <div class="relative z-10 flex flex-col items-center justify-between min-h-screen px-4 sm:px-6 lg:px-8">
            <!-- Section texte -->
            <div class="w-full pt-20 pb-10 text-center">
                <h1 class="text-3xl sm:text-5xl lg:text-6xl text-white font-extrabold leading-tight animate-slide-in drop-shadow-md">
                    Votre Avenir <br> Commence Ici
                </h1>
                <p class="mt-4 text-sm sm:text-lg lg:text-xl text-white/90 animate-slide-in animation-delay-200 max-w-2xl mx-auto">
                    Rejoignez des milliers d’étudiants et commencez vos études au Canada dès aujourd’hui !
                </p>

                <!-- Boutons -->
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center mt-6 sm:mt-8">
                    <a href="{{ route('login') }}" class="flex items-center gap-3 bg-indigo-500 text-white px-5 py-2 sm:px-7 sm:py-3 rounded-full hover:bg-indigo-600 hover:scale-110 hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-sign-in-alt text-base sm:text-lg"></i>
                        <span class="font-semibold text-sm sm:text-base">Connexion</span>
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center gap-3 bg-teal-500 text-white px-5 py-2 sm:px-7 sm:py-3 rounded-full hover:bg-teal-600 hover:scale-110 hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-user-plus text-base sm:text-lg"></i>
                        <span class="font-semibold text-sm sm:text-base">Inscription</span>
                    </a>
                </div>
            </div>


            <!-- Image au premier plan -->
           
        </div>
    </div>

    
   
</x-guest-layout>