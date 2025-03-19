<x-guest-layout>
    <div class="relative h-screen bg-cover bg-center" style="background-image: url('path/to/your/background-image.jpg');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <x-application-logo class="block h-20 mx-auto mb-4" />
                <h1 id="dynamic-title" class="text-5xl font-bold mb-2"></h1>
                <p class="text-lg mb-6">Votre avenir commence ici. Formations professionnelles adaptées à vos besoins.</p>
                <button @click="showModal = true" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    En savoir plus
                </button>

                <div class="mt-4">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-blue-300 hover:underline">Se connecter</a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-blue-300 hover:underline">S'inscrire</a>
                    @endif

                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="ml-4 text-blue-300 hover:underline">Se déconnecter</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-data="{ showModal: false }" x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-11/12 max-w-md">
                <h2 class="text-lg font-bold mb-4">À propos de nous</h2>
                <p class="mb-4">Nous offrons des formations de qualité dans divers domaines, adaptées à vos besoins professionnels.</p>
                <button @click="showModal = false" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-4 rounded">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const titleText = "Bienvenue au Centre de Formation Professionnelle La Canadienne";
            const titleElement = document.getElementById('dynamic-title');
            let index = 0;

            function typeLetter() {
                if (index < titleText.length) {
                    titleElement.textContent += titleText.charAt(index);
                    index++;
                    setTimeout(typeLetter, 100); // Ajustez la vitesse ici
                }
            }

            typeLetter();
        });
    </script>
</x-guest-layout>