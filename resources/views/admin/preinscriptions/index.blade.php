<x-app-layout>
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">Gestion des Préinscriptions</h1>
        

        <div class="mb-4">
            <a href="" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                Préinscrire un utilisateur
            </a>
        </div>

        <!-- Affichage du message de succès amélioré -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md text-center mb-6">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID Préinscription</th>
                    <th class="py-3 px-6 text-left">User ID</th>
                    <th class="py-3 px-6 text-left">Matricule</th>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Prénom</th>
                    <th class="py-3 px-6 text-left">Né le</th>
                    <th class="py-3 px-6 text-left">Lieu de naissance</th>
                    <th class="py-3 px-6 text-left">Ville</th>
                    <th class="py-3 px-6 text-left">Département</th>
                    <th class="py-3 px-6 text-left">Pays</th>
                    <th class="py-3 px-6 text-left">Sexe</th>
                    <th class="py-3 px-6 text-left">Nationalité</th>
                    <th class="py-3 px-6 text-left">Statut familial</th>
                    <th class="py-3 px-6 text-left">Handicapé</th>
                    <th class="py-3 px-6 text-left">Obtention</th>
                    <th class="py-3 px-6 text-left">Série</th>
                    <th class="py-3 px-6 text-left">Mention ID</th>
                    <th class="py-3 px-6 text-left">École</th>
                    <th class="py-3 px-6 text-left">Spécialité ID</th>
                    <th class="py-3 px-6 text-left">Statut</th>
                    <th class="py-3 px-6 text-left">Statut Chef</th>
                    <th class="py-3 px-6 text-left">Financement ID</th>
                    <th class="py-3 px-6 text-left">Paiement ID</th>
                    <th class="py-3 px-6 text-left">À l'étranger</th>
                    <th class="py-3 px-6 text-left">Année Passée 1</th>
                    <th class="py-3 px-6 text-left">Année Passée 2</th>
                    <th class="py-3 px-6 text-left">Année Passée 3</th>
                    <th class="py-3 px-6 text-left">Année Passée 4</th>
                    <th class="py-3 px-6 text-left">Nom Complet</th>
                    <th class="py-3 px-6 text-left">Téléphone</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">Signature</th>
                    <th class="py-3 px-6 text-left">Créé le</th>
                    <th class="py-3 px-6 text-left">Mis à jour</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($preinscrits as $preinscrit)
                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $preinscrit->id }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->user_id }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->matricule }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->surname }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->birth_day }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->birth_place }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->city }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->departement }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->county }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->sex }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->nationality }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->family_status }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->disabled }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->obtaining }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->serie }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->mention_id }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->school }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->speciality_id }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->statut }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->statutChief }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->financement_id }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->payment_mode_id }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->study_abroad }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->annee_passed1 }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->annee_passed2 }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->annee_passed3 }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->annee_passed4 }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->full_name }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->phone_number }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->email }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->date }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->signature }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->created_at }}</td>
                        <td class="py-3 px-6 text-left">{{ $preinscrit->updated_at }}</td>
                        <td x-data class="py-3 px-6 text-center flex">
                            <a href="{{ route('preinscription.edit', $preinscrit) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded">
                                Modifier
                            </a>
                            <a @click.prevent="$refs.delete.submit()" href="{{ route('admin.preinscriptions.destroy', $preinscrit) }}" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded ml-2 cursor-pointer" >
                                Supprimer
                            </a>
                            <form hidden action="{{ route('admin.preinscriptions.destroy', $preinscrit) }}" method="POST" class="hidden">
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
