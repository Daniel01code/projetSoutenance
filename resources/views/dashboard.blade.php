<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord des préinscrits
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/background-dashboard.jpg') }}');">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Affichage du message de succès -->
                @if (session('message'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
    
                <!-- Contenu du tableau de bord -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Bienvenue sur le tableau de bord des préinscrits !
                        <!-- Ici, tu peux ajouter une liste des préinscriptions, par exemple -->
                    </div>
                </div>
            </div>
            <!-- Overlay pour lisibilité -->
            <div class="min-h-screen bg-black bg-opacity-50 flex flex-col items-center justify-center p-6 text-white">
                <!-- En-tête -->
                <header class="w-full max-w-4xl text-center mb-10">
                    <h1 class="text-4xl font-bold mb-4">Bienvenue au Centre de Formation Professionnelle La Canadienne</h1>
                    <p class="text-lg">Merci de nous avoir choisis pour votre avenir professionnel !</p>
                </header>
    
                <!-- Conteneur principal des blocs -->
                <div class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bloc de bienvenue -->
                    <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-800">
                        <h2 class="text-2xl font-semibold mb-4">Un grand merci !</h2>
                        <p class="text-lg">
                            Merci de choisir le Centre de Formation La Canadienne pour vous former. Votre inscription est en cours de validation par notre équipe. Vous recevrez bientôt une confirmation.
                        </p>
                    </div>
    
                    <!-- Bloc d'actualité -->
                    <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-800">
                        <h2 class="text-2xl font-semibold mb-4">Suivez notre actualité</h2>
                        <p class="text-lg">
                            Restez informé(e) des dernières nouvelles, événements et opportunités de formation. Consultez notre site ou suivez-nous sur les réseaux sociaux pour ne rien manquer !
                        </p>
                        <a href="#" class="text-blue-600 hover:underline mt-2 inline-block">En savoir plus</a>
                    </div>
    
                    <!-- Bloc promotionnel 1 -->
                    <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-800">
                        <h2 class="text-2xl font-semibold mb-4">Excellence et Professionnalisme</h2>
                        <p class="text-lg">
                            Avec des formateurs qualifiés et des programmes adaptés, nous vous offrons une formation de qualité pour exceller dans votre domaine.
                        </p>
                    </div>
    
                    <!-- Bloc promotionnel 2 -->
                    <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-800">
                        <h2 class="text-2xl font-semibold mb-4">Un tremplin pour votre carrière</h2>
                        <p class="text-lg">
                            Nos diplômes reconnus et notre réseau de partenaires vous ouvrent les portes d’un avenir professionnel prometteur.
                        </p>
                    </div>
                </div>
    
                <!-- Pied de page -->
                <footer class="mt-10 text-center">
                    <p class="text-sm">Centre de Formation Professionnelle La Canadienne &copy; {{ date('Y') }}</p>
                </footer>
            </div>
        </div>
    </div>
</x-app-layout>
