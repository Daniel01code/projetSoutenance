{{-- preinscription/viewPreincriptionValidation.blade.php --}}
<x-app-layout>
    <div class="bg-gray-100 text-gray-800 p-6">
        <header class="flex justify-between items-center mb-6">
            <div class="text-center">
                <p class="font-bold">MINISTRE DE L'EMPLOI ET DE <br> LA FORMATION PROFESSIONNELLE</p>
                <p class="font-bold"></p>
                <p class="font-bold">CENTRE DE FORMATION <br> PROFESSIONNELLE LA CANADIENNE</p>
            </div>
            <div>
                <x-application-logo class="block h-15 w-20 fill-current text-gray-800" />
            </div>
            <div class="text-center">
                <p class="font-bold">MINISTRY OF EMPLOYMENT AND<br> VOCATIONAL TRAINING</p>
                <p class="font-bold"></p>
                <p class="font-bold">CANADIAN VOCATIONAL<br> TRAINING CENTER</p>
            </div>
        </header>

        <h1 class="text-3xl font-semibold text-center mb-6">FICHE DE PRÉ-INSCRIPTION 2024/2025</h1>
    
        <!-- Affichage du message de succès amélioré -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md text-center mb-6">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        <div class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            @if (isset($preInscription))
                <input type="hidden" name="user_id" value="{{ $preInscription->user_id }}">

                <!-- Nouvelle section pour la photo -->
                <fieldset class="border-none mb-4">
                    <div class="flex justify-end">
                        <div class="w-[4cm] h-[4cm] border-2 border-dashed border-gray-400 rounded-md flex items-center justify-center photo-4x4">
                            @if ($preInscription->fileUpload)
                                <img src="{{ asset('storage/' . $preInscription->fileUpload) }}" alt="Photo de l'étudiant" class="w-full h-full object-cover">
                            @else
                                <span class="text-gray-500">Aucune photo</span>
                            @endif
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border-none mb-4">
                    <h2 class="text-2xl font-semibold text-center mb-4">ÉTAT CIVIL</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Matricule de l'étudiant :</label>
                            <p class="underline w-2/3">{{ $preInscription->matricule }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Nom :</label>
                            <p class="underline w-2/3">{{ $preInscription->name }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Prénom :</label>
                            <p class="underline w-2/3">{{ $preInscription->surname }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Date de naissance :</label>
                            <p class="underline w-2/3">{{ $preInscription->birth_day }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Lieu de naissance :</label>
                            <p class="underline w-2/3">{{ $preInscription->birth_place }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Ville :</label>
                            <p class="underline w-2/3">{{ $preInscription->city }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Département :</label>
                            <p class="underline w-2/3">{{ $preInscription->departement }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Pays :</label>
                            <p class="underline w-2/3">{{ $preInscription->country }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Sexe :</label>
                            <p class="underline w-2/3">{{ $preInscription->sex }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Nationalité :</label>
                            <p class="underline w-2/3">{{ $preInscription->nationality }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Situation familiale :</label>
                            <p class="underline w-2/3">{{ $preInscription->family_status }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Êtes-vous dans une situation de handicap ? :</label>
                            <p class="underline w-2/3">{{ $preInscription->disabled ? 'Oui' : 'Non' }}</p>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border-none mb-4">
                    <h2 class="text-2xl font-semibold text-center mb-4">Niveau scolaire ou diplôme équivalent</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Année d'obtention :</label>
                            <p class="underline w-2/3">{{ $preInscription->obtaining }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Série :</label>
                            <p class="underline w-2/3">{{ $preInscription->serie }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Mention :</label>
                            <p class="underline w-2/3">{{ $preInscription->mention->name }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">École d'obtention :</label>
                            <p class="underline w-2/3">{{ $preInscription->school }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Spécialité :</label>
                            <p class="underline w-2/3">{{ $preInscription->speciality->name }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Statut ou fonction de l'étudiant :</label>
                            <p class="underline w-2/3">{{ $preInscription->statut }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Statut du chef de famille :</label>
                            <p class="underline w-2/3">{{ $preInscription->statutChief }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Continuer vos études à l'étranger ? :</label>
                            <p class="underline w-2/3">{{ $preInscription->study_abroad ? 'Oui' : 'Non' }}</p>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border-none mb-4">
                    <h2 class="text-2xl font-semibold text-center mb-4">Financement de la formation</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Financement :</label>
                            <p class="underline w-2/3">{{ $preInscription->financement->name }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Mode de paiement :</label>
                            <p class="underline w-2/3">{{ $preInscription->payment_mode->name }}</p>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border-none mb-4">
                    <h2 class="text-2xl font-semibold text-center mb-4">Informations personnelles</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Cursus académique des années antérieures :</label>
                            <p class="underline w-2/3"></p> <!-- Espace réservé -->
                        </div>
                        
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">2023/2024 :</label>
                            <p class="underline w-2/3">{{ $preInscription->annee_passed1 }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">2022/2023 :</label>
                            <p class="underline w-2/3">{{ $preInscription->annee_passed2 }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">2021/2022 :</label>
                            <p class="underline w-2/3">{{ $preInscription->annee_passed3 }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">2020/2021 :</label>
                            <p class="underline w-2/3">{{ $preInscription->annee_passed4 }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Votre nom complet :</label>
                            <p class="underline w-2/3">{{ $preInscription->full_name }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Numéro de téléphone :</label>
                            <p class="underline w-2/3">{{ $preInscription->phone_number }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Adresse email valide :</label>
                            <p class="underline w-2/3">{{ $preInscription->email }}</p>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border-none mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Date :</label>
                            <p class="underline w-2/3">{{ $preInscription->date }}</p>
                        </div>
                        <div class="flex items-center">
                            <label class="block mb-1 font-bold w-1/3">Signature :</label>
                            <p class="underline w-2/3">{{ $preInscription->signature }}</p>
                        </div>
                    </div>
                </fieldset>

                <!-- Ajout des deux boutons -->
                <div class="flex space-x-4 mt-6">
                    <button id="printButton" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                        Imprimer
                    </button>
                    <a href="{{ route('preinscription.download', $preInscription) }}" class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700">
                        Générer PDF
                    </a>
                    <a href="{{ route('preinscription.edit', $preInscription) }}" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-green-700">
                        Modifier Informations
                    </a>
                    <!-- Nouveau bouton pour voir le PDF -->
                    <a href="{{ route('preinscription.view', $preInscription) }}" class="bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700" target="_blank">
                        Voir PDF
                    </a>
                </div>
            @else
                <p>{{ $message }}</p>
            @endif
        </div>
    </div>

    <!-- Script pour l'impression -->
    <script>
        document.getElementById('printButton').addEventListener('click', function () {
            window.print();
        });
    </script>

    <!-- Styles pour l'impression -->
    <style>
        @media print {
            #printButton, a[href] {
                display: none; /* Masquer les boutons lors de l'impression */
            }
            .bg-gray-100 {
                background-color: white;
            }
            .shadow-md, .rounded-lg {
                box-shadow: none;
                border: 1px solid #ccc;
            }
            .p-6 {
                padding: 1cm;
            }
            h1 {
                font-size: 24pt;
            }
            h2 {
                font-size: 18pt;
            }
            p, label {
                font-size: 12pt;
            }
            fieldset {
                page-break-inside: avoid;
            }
        }
    </style>
</x-app-layout>