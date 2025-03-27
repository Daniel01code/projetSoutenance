<x-app-layout>
    <!-- Inclure Alpine.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        .slide { display: none; }
        .slide.active { display: block; }
        .btn-slide { padding: 10px 20px; margin: 5px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .btn-slide:disabled { background-color: #cccccc; cursor: not-allowed; }
        .btn-submit { background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; width: 100%; }
        .btn-submit:hover { background-color: #0056b3; }
        .progress { font-size: 1.1rem; font-weight: bold; margin-bottom: 1rem; }
    </style>

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

        <!-- Formulaire avec Alpine.js -->
        <div x-data="{ currentSlide: 0, totalSlides: 4 }" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('preinscriptionValidation') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <!-- Indicateur de progression -->
                <div class="text-center progress">
                    Page <span x-text="currentSlide + 1"></span> sur <span x-text="totalSlides"></span>
                </div>

                <!-- Slide 1 : Informations Initiales + État Civil -->
                <div class="slide" x-show="currentSlide === 0" x-bind:class="{ 'active': currentSlide === 0 }">
                    <h2 class="text-2xl font-semibold text-center mb-4">Étape 1 : Informations Initiales et État Civil</h2>
                    <div class="space-y-4">
                        <!-- Informations Initiales -->
                        <div class="flex justify-end">
                            <div class="w-32 h-32 border-2 border-dashed border-gray-400 rounded-md flex items-center justify-center relative ml-4">
                                <input type="file" id="fileUpload" name="fileUpload" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                                <span class="text-gray-500">Cliquez pour importer une photo</span>
                                @error('fileUpload')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- État Civil -->
                        <fieldset class="border-none">
                            <div class="space-y-2">
                                <label for="name" class="block mb-1 font-medium">Nom</label>
                                <input type="text" name="name" id="name" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                                @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="surname" class="block mb-1 font-medium">Prénom</label>
                                <input type="text" name="surname" id="surname" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('surname') border-red-500 @enderror" value="{{ old('surname') }}" required>
                                @error('surname') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="birth_day" class="block mb-1 font-medium">Date de naissance</label>
                                <input type="date" name="birth_day" id="birth_day" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('birth_day') border-red-500 @enderror" value="{{ old('birth_day') }}" required>
                                @error('birth_day') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="birth_place" class="block mb-1 font-medium">Lieu de naissance</label>
                                <input type="text" name="birth_place" id="birth_place" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('birth_place') border-red-500 @enderror" value="{{ old('birth_place') }}" required>
                                @error('birth_place') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="city" class="block mb-1 font-medium">Ville</label>
                                <input type="text" name="city" id="city" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('city') border-red-500 @enderror" value="{{ old('city') }}" required>
                                @error('city') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="departement" class="block mb-1 font-medium">Département</label>
                                <input type="text" name="departement" id="departement" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('departement') border-red-500 @enderror" value="{{ old('departement') }}" required>
                                @error('departement') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="country" class="block mb-1 font-medium">Pays</label>
                                <input type="text" name="country" id="country" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('country') border-red-500 @enderror" value="{{ old('country') }}" required>
                                @error('country') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="sex" class="block mb-1 font-medium">Sexe :</label>
                                <select name="sex" id="sex" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('sex') border-red-500 @enderror" required>
                                    <option value="">Sélectionnez</option>
                                    @foreach ($sexes as $value => $label)
                                        <option value="{{ $value }}" {{ old('sex') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('sex') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="nationality" class="block mb-1 font-medium">Nationalité</label>
                                <input type="text" name="nationality" id="nationality" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('nationality') border-red-500 @enderror" value="{{ old('nationality') }}" required>
                                @error('nationality') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="family_status" class="block mb-1 font-medium">Situation familiale :</label>
                                <select name="family_status" id="family_status" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('family_status') border-red-500 @enderror" required>
                                    <option value="">Sélectionnez</option>
                                    @foreach ($familyStatuses as $value => $label)
                                        <option value="{{ $value }}" {{ old('family_status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('family_status') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                                <label for="disabled" class="block mb-1 font-medium">Êtes-vous dans une situation de handicap ?</label>
                                <select name="disabled" id="disabled" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('disabled') border-red-500 @enderror" required>
                                    <option value="">Sélectionnez</option>
                                    <option value="1" {{ old('disabled') == '1' ? 'selected' : '' }}>Oui</option>
                                    <option value="0" {{ old('disabled') == '0' ? 'selected' : '' }}>Non</option>
                                </select>
                                @error('disabled') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>
                        </fieldset>
                    </div>
                    <div class="mt-6 text-center">
                        <button type="button" class="btn-slide" x-on:click="currentSlide = 1">Suivant</button>
                    </div>
                </div>

                <!-- Slide 2 : Niveau Scolaire ou Diplôme -->
                <div class="slide" x-show="currentSlide === 1" x-bind:class="{ 'active': currentSlide === 1 }">
                    <fieldset class="border-none mb-4">
                        <h2 class="text-2xl font-semibold text-center mb-4">Étape 2 : Niveau Scolaire ou Diplôme</h2>
                        <div class="space-y-2">
                            <label for="obtaining" class="block mb-1 font-medium">Année d'obtention</label>
                            <input type="date" name="obtaining" id="obtaining" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('obtaining') border-red-500 @enderror" value="{{ old('obtaining') }}" required>
                            @error('obtaining') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="serie" class="block mb-1 font-medium">Série</label>
                            <input type="text" name="serie" id="serie" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('serie') border-red-500 @enderror" value="{{ old('serie') }}" required>
                            @error('serie') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="mention_id" class="block mb-1 font-medium">Mention</label>
                            <select name="mention_id" id="mention_id" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('mention_id') border-red-500 @enderror" required>
                                <option value="">Sélectionnez une mention</option>
                                @foreach ($mentions as $mention)
                                    <option value="{{ $mention->id }}" {{ old('mention_id') == $mention->id ? 'selected' : '' }}>{{ $mention->name }}</option>
                                @endforeach
                            </select>
                            @error('mention_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="school" class="block mb-1 font-medium">École d'obtention</label>
                            <input type="text" name="school" id="school" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('school') border-red-500 @enderror" value="{{ old('school') }}" required>
                            @error('school') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="speciality_id" class="block mb-1 font-medium">Choisissez une spécialité :</label>
                            <select name="speciality_id" id="speciality_id" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('speciality_id') border-red-500 @enderror" required>
                                <option value="">Sélectionnez une spécialité</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->name }}">
                                        @foreach ($category->specialités as $specialité)
                                            <option value="{{ $specialité->id }}" {{ old('speciality_id') == $specialité->id ? 'selected' : '' }}>{{ $specialité->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('speciality_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="statut" class="block mb-1 font-medium">Statut ou fonction de l'étudiant</label>
                            <input type="text" name="statut" id="statut" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('statut') border-red-500 @enderror" value="{{ old('statut') }}" required>
                            @error('statut') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="statutChief" class="block mb-1 font-medium">Statut du chef de famille</label>
                            <input type="text" name="statutChief" id="statutChief" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('statutChief') border-red-500 @enderror" value="{{ old('statutChief') }}" required>
                            @error('statutChief') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="study_abroad" class="block mb-1 font-medium">Continuer vos études à l'étranger ?</label>
                            <select name="study_abroad" id="study_abroad" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('study_abroad') border-red-500 @enderror" required>
                                <option value="">Sélectionnez</option>
                                <option value="1" {{ old('study_abroad') == '1' ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ old('study_abroad') == '0' ? 'selected' : '' }}>Non</option>
                            </select>
                            @error('study_abroad') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                        </div>
                    </fieldset>
                    <div class="mt-6 text-center">
                        <button type="button" class="btn-slide" x-on:click="currentSlide = 0">Précédent</button>
                        <button type="button" class="btn-slide" x-on:click="currentSlide = 2">Suivant</button>
                    </div>
                </div>

                <!-- Slide 3 : Financement de la Formation -->
                <div class="slide" x-show="currentSlide === 2" x-bind:class="{ 'active': currentSlide === 2 }">
                    <fieldset class="border-none mb-4">
                        <h2 class="text-2xl font-semibold text-center mb-4">Étape 3 : Financement de la Formation</h2>
                        <div class="space-y-2">
                            <div class="mb-4">
                                @foreach ($finances as $finance)
                                    <div class="mb-2">
                                        <label for="financement{{ $finance->id }}" class="block mb-1 font-medium">{{ $finance->name }}</label>
                                        <input type="radio" id="financement{{ $finance->id }}" name="financement_id" value="{{ $finance->id }}" class="mr-2" {{ old('financement_id') == $finance->id ? 'checked' : '' }} required>
                                    </div>
                                @endforeach
                                @error('financement_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <input type="text" id="financement_origine" name="financement_origine" placeholder="Spécifier en cas d'option manquante sur l'origine du financement" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('financement_origine') border-red-500 @enderror" value="{{ old('financement_origine') }}">
                                @error('financement_origine') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>

                            <h2 class="text-2xl font-semibold text-center mb-4">Mode de Paiement</h2>
                            @foreach ($paiements as $paiement)
                                <div class="mb-2">
                                    <label for="paiement{{ $paiement->id }}" class="block mb-1 font-medium">{{ $paiement->name }}</label>
                                    <input type="radio" id="paiement{{ $paiement->id }}" name="payment_mode_id" value="{{ $paiement->id }}" class="mr-2" {{ old('payment_mode_id') == $paiement->id ? 'checked' : '' }} required>
                                </div>
                            @endforeach
                            @error('payment_mode_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                        </div>
                    </fieldset>
                    <div class="mt-6 text-center">
                        <button type="button" class="btn-slide" x-on:click="currentSlide = 1">Précédent</button>
                        <button type="button" class="btn-slide" x-on:click="currentSlide = 3">Suivant</button>
                    </div>
                </div>

                <!-- Slide 4 : Informations Personnelles et Finalisation -->
                <div class="slide" x-show="currentSlide === 3" x-bind:class="{ 'active': currentSlide === 3 }">
                    <fieldset class="border-none mb-4">
                        <h2 class="text-2xl font-semibold text-center mb-4">Étape 4 : Informations Personnelles et Finalisation</h2>
                        <div class="space-y-2">
                            <label for="annee_passed1" class="block mb-1 font-medium">Cursus académique des années antérieures</label>
                            <label for="annee_passed1" class="block mb-1 font-medium">2023/2024</label>
                            <input type="text" name="annee_passed1" id="annee_passed1" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('annee_passed1') border-red-500 @enderror" value="{{ old('annee_passed1') }}" required>
                            @error('annee_passed1') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="annee_passed2" class="block mb-1 font-medium">2022/2023</label>
                            <input type="text" name="annee_passed2" id="annee_passed2" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('annee_passed2') border-red-500 @enderror" value="{{ old('annee_passed2') }}" required>
                            @error('annee_passed2') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="annee_passed3" class="block mb-1 font-medium">2021/2022</label>
                            <input type="text" name="annee_passed3" id="annee_passed3" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('annee_passed3') border-red-500 @enderror" value="{{ old('annee_passed3') }}" required>
                            @error('annee_passed3') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="annee_passed4" class="block mb-1 font-medium">2020/2021</label>
                            <input type="text" name="annee_passed4" id="annee_passed4" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('annee_passed4') border-red-500 @enderror" value="{{ old('annee_passed4') }}" required>
                            @error('annee_passed4') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <h2 class="text-2xl font-semibold text-center mb-4">Mes Identifiants</h2>
                            <label for="full_name" class="block mb-1 font-medium">Votre nom complet</label>
                            <input type="text" name="full_name" id="full_name" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('full_name') border-red-500 @enderror" value="{{ old('full_name') }}" required>
                            @error('full_name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="phone_number" class="block mb-1 font-medium">Numéro de téléphone</label>
                            <input type="tel" name="phone_number" id="phone_number" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('phone_number') border-red-500 @enderror" value="{{ old('phone_number') }}" required>
                            @error('phone_number') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="email" class="block mb-1 font-medium">Adresse email valide</label>
                            <input type="email" name="email" id="email" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                            @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <h3 class="text-lg font-semibold">NB : À remplir obligatoirement</h3>
                            <p>Je déclare sur l'honneur que les renseignements fournis à l'appui de cette demande sont complets et exacts.</p>

                            <label for="date" class="block mb-1 font-medium">Date</label>
                            <input type="date" name="date" id="date" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('date') border-red-500 @enderror" value="{{ old('date') }}" required>
                            @error('date') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                            <label for="signature" class="block mb-1 font-medium">Signature</label>
                            <input type="text" name="signature" id="signature" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400 @error('signature') border-red-500 @enderror" value="{{ old('signature') }}">
                            @error('signature') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                        </div>
                    </fieldset>
                    <div class="mt-6 text-center">
                        <button type="button" class="btn-slide" x-on:click="currentSlide = 2">Précédent</button>
                        <button type="submit" class="btn-submit" :disabled="currentSlide !== totalSlides - 1">Soumettre</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>