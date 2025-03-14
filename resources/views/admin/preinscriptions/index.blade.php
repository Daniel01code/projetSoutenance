<x-app-layout>

    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Posts</h1>
            <p class="mt-2 text-sm text-gray-700">Interface d'administration les préinscription</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{-- {{ route('admin.preincriptions.create') }} --}}" class="inline-flex rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">préinscrire un user(utilisateur)</a>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">idPrincription</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">user_id</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">matricule</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">name</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">surname</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">né le :</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">birth_place</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">city</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">departement</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">country</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">sex</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">nationalité</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">family_status</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">andicapé</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">optention</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">serie</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">mention id</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">shool</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">speciality id</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">status</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">statusChef</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">financement id</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">paiement id</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">a l'etrangé</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">annéePass1</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">annéePass2</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">annéePass3</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">annéePass4</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">tout le nom</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">telephone</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">email</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">date</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">signature</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">creer le</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">mise a jou</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($preinscrits as $preinscrit)
                        <tr class="even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->id }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->user_id }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->matricule }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->name }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->surname }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->birth_day }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->birth_place }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->city }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->departement }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->county }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->sex }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->nationality}}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->family_status}}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->disabled }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->obtaining}}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->serie }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->mention_id}}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->school }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->speciality_id }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->statut }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->statutChief }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->financement_id }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->payment_mode_id }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->study_abroad }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->annee_passed1 }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->annee_passed2 }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->annee_passed3 }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->annee_passed4 }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->full_name }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->phone_number }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->email }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->date }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->signature }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->created_at }}</td>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $preinscrit->updated_at }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <a href="{{ route('admin.preinscriptions.show', $preinscrit->id) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 font-semibold transition duration-200 ease-in-out">
                                    Voir l'étudiant
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <a href="{{ route('admin.preinscriptions.edit', $preinscrit->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold transition duration-200 ease-in-out">
                                    Éditer
                                </a>
                            </td>
                            <td x-data class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
                                <a @click.prevent="$refs.delete.submit()" class="text-red-600 hover:text-red-900 font-semibold transition duration-200 ease-in-out cursor-pointer">
                                    Supprimer
                                </a>
                                <form x-ref="delete" action="{{ route('admin.preinscriptions.destroy', $preinscrit->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
