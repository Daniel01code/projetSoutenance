<x-app-layout>
    <div class="container mx-auto mt-10" x-data="{ showEditForm: false, editSpecialityId: null, editSpecialityName: '', editCategoryId: null }">
        <h1 class="text-3xl font-bold mb-6">Gestion des spécialités</h1>

        <!-- Formulaire de Création d'une spécialité -->
        <div class="mb-6">
            <form action="{{ route('admin.speciality.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nom de la Spécialité
                    </label>
                    <input type="text" id="name" name="name" required placeholder="Entrez le nom de la spécialité" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <label for="cathegory_id" class="block mb-1 font-medium">Choisissez la catégorie de la formation :</label>
                <select name="cathegory_id" id="cathegory_id" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('cathegory_id') border-red-500 @enderror" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('cathegory_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                <div class="flex items-center justify-between py-3">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Ajouter une spécialité
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
        <h2 class="text-2xl font-bold mb-4">Modifier la Spécialité</h2>
        <form :action="'/admin/speciality/'+ editSpecialityId " method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
    
            <!-- Champ : Nom de la spécialité -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-name">
                    Nom de la spécialité
                </label>
                <input 
                    type="text" 
                    id="edit-name" 
                    name="name" 
                    x-model="editSpecialityName" 
                    required 
                    maxlength="255" 
                    placeholder="Entrez le nom de la spécialité" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                />
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Champ : Catégorie -->
            <div class="mb-4">
                <label for="edit-cathegory_id" class="block mb-1 font-medium">Catégorie :</label>
                <select 
                    name="cathegory_id" 
                    id="edit-cathegory_id" 
                    x-model="editCategoryId" 
                    class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('cathegory_id') border-red-500 @enderror" 
                    required
                >
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('cathegory_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Boutons -->
            <div class="flex items-center justify-between">
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                    Mettre à Jour
                </button>
                <button 
                    type="button" 
                    @click="showEditForm = false" 
                    class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                    Annuler
                </button>
            </div>
        </form>
    </div>
        <!-- Affichage de la table -->
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Catégorie</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($specialities as $speciality)
                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $speciality->id }}</td>
                        <td class="py-3 px-6 text-left">{{ $speciality->name }}</td>
                        <td class="py-3 px-6 text-left">
                            {{ $speciality->cathegory->name ?? 'Sans catégorie' }}
                        </td>
                        <td class="py-3 px-6 text-center" x-data>
                            <button type="button" @click="showEditForm = true; editSpecialityId = {{ $speciality->id }}; editSpecialityName = '{{ $speciality->name }}'; editCategoryId = '{{ $speciality->cathegory_id }}'" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded mr-3">
                                Modifier
                            </button>
                            <a href="{{ route('admin.speciality.destroy', $speciality) }}" @click.prevent="$refs.delete.submit()" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                Supprimer
                            </a>

                            <form x-ref="delete" action="{{ route('admin.speciality.destroy', $speciality) }}" method="POST" class="hidden">
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