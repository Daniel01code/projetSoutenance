<x-app-layout>
    <body class="bg-gray-100 text-gray-800 p-6">
        <header class="flex justify-between items-center mb-6">
            <div class="text-center">
                <p class="font-bold">MINISTRE DE L'EMPLOI ET DE <br> LA FORMATION PROFESSIONNELLE</p>
                <p class="font-bold">*********</p>
                <p class="font-bold">CENTRE DE FORMATION <br> PROFESSIONNELLE LA CANADIENNE</p>
            </div>
            <div>
                <x-application-logo class="block h-15 w-20 fill-current text-gray-800" />

            </div>
            <div class="text-center">
                <p class="font-bold">MINISTRY OF EMPLOYMENT AND<br> VOCATIONAL TRAINING</p>
                <p class="font-bold">*********</p>
                <p class="font-bold">CANADIAN VOCATIONAL<br> TRAINING CENTER</p>
            </div>
        </header>
    
        <h1 class="text-3xl font-semibold text-center mb-6">FICHE DE PRÉ-INSCRIPTION 2024/2025</h1>
    
        <form action="" method="post" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between">
                <div class="flex-1 mr-4">
                    <label for="matricule" class="block mb-1 font-medium">Matricule de l'étudiant</label>
                    <input type="text" id="matricule" name="matricule" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
                </div>
                <div class="w-32 h-32 border-2 border-dashed border-gray-400 rounded-md flex items-center justify-center relative ml-4">
                    <input type="file" id="fileUpload" name="fileUpload" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                    <span class="text-gray-500">Cliquez pour importer une photo</span>
                </div>
            </div>
    
            <fieldset class="border-none mb-4">
                <h2 class="text-2xl font-semibold text-center mb-4">ÉTAT CIVIL</h2>
                <div class="space-y-2">
                    <label for="name" class="block mb-1 font-medium">Nom</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="surname" class="block mb-1 font-medium">Prénom</label>
                    <input type="text" name="surname" id="surname" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="birthDay" class="block mb-1 font-medium">Date de naissance</label>
                    <input type="date" name="birthDay" id="birthDay" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="birthPlace" class="block mb-1 font-medium">Lieu de naissance</label>
                    <input type="text" name="birthPlace" id="birthPlace" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="city" class="block mb-1 font-medium">Ville</label>
                    <input type="text" name="city" id="city" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="departement" class="block mb-1 font-medium">Département</label>
                    <input type="text" name="departement" id="departement" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="country" class="block mb-1 font-medium">Pays</label>
                    <input type="text" name="country" id="country" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="sex" class="block mb-1 font-medium">Sexe :</label>
                    <select name="sex" id="sex" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
                        <option value="masculin">Masculin</option>
                        <option value="feminin">Féminin</option>
                    </select>
    
                    <label for="nationality" class="block mb-1 font-medium">Nationalité</label>
                    <input type="text" name="nationality" id="nationality" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="familyStatus" class="block mb-1 font-medium">Situation familiale :</label>
                    <select name="familyStatus" id="familyStatus" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
                        <option value="marie">Marié</option>
                        <option value="celibataire">Célibataire</option>
                    </select>
    
                    <label for="disabled" class="block mb-1 font-medium">Êtes-vous dans une situation de handicap ?</label>
                    <select name="disabled" id="disabled" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
            </fieldset>
    
            <fieldset class="border-none mb-4">
                <h2 class="text-2xl font-semibold text-center mb-4">Niveau scolaire ou diplôme équivalent</h2>
                <div class="space-y-2">
                    <label for="obtaining" class="block mb-1 font-medium">Année d'obtention</label>
                    <input type="date" name="obtaining" id="obtaining" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="serie" class="block mb-1 font-medium">Série</label>
                    <input type="text" name="serie" id="serie" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="mention" class="block mb-1 font-medium">Mention</label>
                    <select name="mention" id="mention" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
                        <option value="passable">Passable</option>
                        <option value="assez_bien">Assez bien</option>
                        <option value="bien">Bien</option>
                        <option value="tres_bien">Très bien</option>
                        <option value="excellent">Excellent</option>
                    </select>
    
                    <label for="school" class="block mb-1 font-medium">École d'obtention</label>
                    <input type="text" name="school" id="school" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="speciality" class="block mb-1 font-medium">Spécialité choisie :</label>
                    <select name="speciality" id="speciality" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
                        <optgroup label="Secrétariat et Administration">
                            <option value="secretariat_bureautique">Secrétariat Bureautique</option>
                            <option value="secretariat_comptable">Secrétariat Comptable</option>
                            <option value="secretariat_direction">Secrétariat de Direction</option>
                        </optgroup>
                        <optgroup label="Informatique et Développement">
                            <option value="maintenance_informatique">Maintenance Informatique</option>
                            <option value="maintenance_reseaux">Maintenance des Réseaux Informatiques</option>
                            <option value="developpement_application">Développement d’Application</option>
                        </optgroup>
                        <optgroup label="Métiers Techniques et Artisanaux">
                            <option value="maintenance_electronique">Maintenance Électronique</option>
                            <option value="maconnerie">Maçonnerie</option>
                            <option value="peinture_batiment">Peinture de Bâtiment</option>
                            <option value="electricite_batiment">Électricité de Bâtiment</option>
                            <option value="mecanique">Mécanique</option>
                        </optgroup>
                        <optgroup label="Hôtellerie et Restauration">
                            <option value="gestion_hotel">Gestion Hôtelière</option>
                            <option value="hotellerie_restauration">Hôtellerie et Restauration</option>
                        </optgroup>
                    </select>
    
                    <label for="statut" class="block mb-1 font-medium">Statut ou fonction de l'étudiant</label>
                    <input type="text" name="statut" id="statut" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                    <label for="statutChief" class="block mb-1 font-medium">Statut du chef de famille</label>
                    <input type="text" name="statutChief" id="statutChief" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
                </div>
            </fieldset>
    
            <fieldset class="border-none mb-4">
                <h2 class="text-2xl font-semibold text-center mb-4">Financement de la formation</h2>
                <div class="space-y-2">
                    <label for="financement1" class="block mb-1 font-medium">Prise en charge par vous-même</label>
                    <input type="radio" id="financement1" name="financement" value="prise_en_charge_moi" class="mr-2">
    
                    <label for="financement2" class="block mb-1 font-medium">Prise en charge par l'employeur</label>
                    <input type="radio" id="financement2" name="financement" value="prise_en_charge_employeur" class="mr-2">
    
                    <label for="financement3" class="block mb-1 font-medium">Bailleur de fonds</label>
                    <input type="radio" id="financement3" name="financement" value="bailleur_de_fonds" class="mr-2">
    
                    <input type="text" id="financement_origine" name="financement_origine" placeholder="L'origine du financement de la formation" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
                    
                    <h2 class="text-2xl font-semibold text-center mb-4">Mode de paiement</h2>
                    <label for="paiement1" class="block mb-1 font-medium">Par mandat</label>
                    <input type="radio" id="paiement1" name="paiement" value="mandat" class="mr-2">
    
                    <label for="paiement2" class="block mb-1 font-medium">Par chèque</label>
                    <input type="radio" id="paiement2" name="paiement" value="cheque" class="mr-2">
    
                    <label for="paiement3" class="block mb-1 font-medium">Par caisse</label>
                    <input type="radio" id="paiement3" name="paiement" value="caisse" class="mr-2">
    
                    <label class="block mb-1 font-medium">Pensez-vous poursuivre vos études à l'étranger ?</label>
                    <span class="mr-2">Oui <input type="radio" name="etude" value="oui"></span>
                    <span>Non <input type="radio" name="etude" value="non"></span>
                </div>
            </fieldset>
    
            <fieldset class="border-none mb-4">
                <h2 class="text-2xl font-semibold text-center mb-4">Informations personnelles</h2>
                <label for="annePassed1" class="block mb-1 font-medium">Cursus académique des années antérieures</label>
                <label for="annePassed1" class="block mb-1 font-medium">2023/2024</label>
                <input type="text" name="annee_passed1" id="annePassed1" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                <label for="annePassed2" class="block mb-1 font-medium">2022/2023</label>
                <input type="text" name="annee_passed2" id="annePassed2" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                <label for="annePassed3" class="block mb-1 font-medium">2021/2022</label>
                <input type="text" name="annee_passed3" id="annePassed3" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                <label for="annePassed4" class="block mb-1 font-medium">2020/2021</label>
                <input type="text" name="annee_passed4" id="annePassed4" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                <h2 class="text-2xl font-semibold text-center mb-4">Mes identifiants</h2>
                <label for="fullName" class="block mb-1 font-medium">Votre nom complet</label>
                <input type="text" name="fullName" id="fullName" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                <label for="number" class="block mb-1 font-medium">Numéro de téléphone</label>
                <input type="number" name="phone_number" id="number" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                <label for="email" class="block mb-1 font-medium">Adresse email valide</label>
                <input type="email" name="email" id="email" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
    
                <h3 class="text-lg font-semibold">NB: A remplir obligatoirement</h3>
                <p>Je déclare sur l'honneur que les renseignements fournis à l'appui de cette demande sont complets et exacts.</p>
            </fieldset>
            
            <label for="date" class="block mb-1 font-medium">Date</label>
            <input type="date" name="date" id="date" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
            
            <label for="signature" class="block mb-1 font-medium">Signature</label>
            <input type="text" name="signature" id="signature" class="w-full p-2 border-b border-gray-300 focus:outline-none focus:ring focus:ring-blue-400">
            
            <button type="submit" class="bg-blue-600 text-white py-2 rounded-md w-full hover:bg-blue-700">Soumettre</button>
        </form>
    </body>
</x-app-layout>