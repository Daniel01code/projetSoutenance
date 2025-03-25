<x-app-layout>
    <div class="container mx-auto mt-10" x-data="{ showEditForm: false, editCategoryId: null, editCategoryName: '' }">
        <h1 class="text-3xl font-bold mb-6">Gestion des Catégories</h1>

        <!-- Formulaire de Création de Catégorie -->
        <div class="mb-6">
            <form action="{{ route('admin.categorie.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nom de la Catégorie
                    </label>
                    <input type="text" id="name" name="name" required placeholder="Entrez le nom de la catégorie" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Ajouter une Catégorie
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Affichage du message de succès -->
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Succès!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        
        <!-- Formulaire de Mise à Jour -->
        <div x-show="showEditForm" class="mt-6" x-transition>
            <h2 class="text-2xl font-bold mb-4">Modifier la Catégorie</h2>
            <form id="updateCategoryForm" action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="document.getElementById('updateCategoryForm').action = '/admin/categorie/' + editCategoryId; document.getElementById('updateCategoryForm').submit()">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-name">
                        Nom de la Catégorie
                    </label>
                    <input type="text" id="edit-name" name="name" x-model="editCategoryName" required placeholder="Entrez le nom de la catégorie" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Mettre à Jour
                    </button>
                    <button type="button" @click="showEditForm = false" class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
                {{-- affichage de la table --}}
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">specialite</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($categories as $cathegory)
                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $cathegory->id }}</td>
                        <td class="py-3 px-6 text-left">{{ $cathegory->name }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($cathegory->specialités->isNotEmpty())
                                <ul class="list-disc pl-5">
                                    @foreach ($cathegory->specialités as $specialité)
                                        <li>{{ $specialité->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                Aucune spécialité associée
                            @endif
                        </td>
                        <td class="py-3 px-8 text-center">
                            <button type="button" @click="showEditForm = true; editCategoryId = {{ $cathegory->id }}; editCategoryName = '{{ $cathegory->name }}'" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded mr-3">
                                Modifier
                            </button>
                            <a href="{{ route('admin.cathegorie.destroy', $cathegory) }}" @click.prevent="$refs.delete.submit()" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                Supprimer
                            </a>

                            <form x-ref="delete" action="{{ route('admin.cathegorie.destroy', $cathegory) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>

