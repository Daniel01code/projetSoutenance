<x-guest-layout>
    <div class="relative h-screen bg-cover bg-center" style="background-image: url('path/to/your/background-image.jpg');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <x-application-logo class="block h-20 mx-auto mb-4" />
                <h1 class="text-5xl font-bold mb-2">Bienvenue au Centre de Formation Professionnelle La Canadienne</h1>
                <p class="text-lg mb-6">Votre avenir commence ici. Formations professionnelles adaptées à vos besoins.</p>
                <button @click="showModal = true" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    En savoir plus
                </button>
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
</x-guest-layout>
