<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fiche de Préinscription {{ $preInscription->matricule }}</title>
    <style>
        @page { 
            size: A4; 
            margin: 20mm; 
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            color: #333;
        }
        .bg-gray-100 {
            background-color: #f3f4f6; /* Simule bg-gray-100 */
            padding: 15mm;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15mm;
        }
        .header-column {
            width: 33%;
            text-align: center;
            font-weight: bold;
        }
        .header-logo {
            width: 33%;
            text-align: center;
        }
        .header-logo img {
            width: 50mm; /* Ajusté pour A4 */
            height: auto;
        }
        h1 {
            font-size: 24pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15mm;
        }
        .success-message {
            background-color: #34d399; /* Simule bg-green-500 */
            color: white;
            padding: 10mm;
            border-radius: 5mm;
            text-align: center;
            margin-bottom: 15mm;
            font-weight: bold;
        }
        .content {
            background-color: white;
            padding: 15mm;
            border-radius: 5mm;
            border: 1px solid #ccc; /* Simule shadow-md */
            margin-bottom: 15mm;
        }
        .photo-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10mm;
        }
        .photo-4x4 {
            width: 40mm;
            height: 40mm;
            border: 2px dashed #9ca3af; /* Simule border-gray-400 */
            border-radius: 5mm;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .photo-4x4 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .photo-4x4 span {
            color: #6b7280; /* Simule text-gray-500 */
        }
        fieldset {
            border: none;
            margin-bottom: 10mm;
        }
        h2 {
            font-size: 18pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10mm;
        }
        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10mm; /* Simule gap-4 */
        }
        .grid div {
            display: flex;
            align-items: center;
            width: 48%; /* Simule grid-cols-2 */
        }
        .grid label {
            font-weight: bold;
            width: 33%; /* w-1/3 */
            margin-bottom: 2mm;
        }
        .grid p {
            width: 67%; /* w-2/3 */
            border-bottom: 1px solid #000; /* Simule underline */
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="bg-gray-100">
        <!-- En-tête -->
        <header class="header">
            <div class="header-column">
                <p>MINISTRE DE L'EMPLOI ET DE<br>LA FORMATION PROFESSIONNELLE</p>
                <p></p>
                <p>CENTRE DE FORMATION<br>PROFESSIONNELLE LA CANADIENNE</p>
            </div>  
            <div class="header-logo">
                
            <img class="w-17 h-14 rounded-full" src="/image/LOGO RETINA.jpg" alt="Logo">
            
            </div>
                <div class="header-column">
                <p>MINISTRY OF EMPLOYMENT AND<br>VOCATIONAL TRAINING</p>
                <p></p>
                <p>CANADIAN VOCATIONAL<br>TRAINING CENTER</p>
            </div>
        </header>

        <!-- Titre -->
        <h1>FICHE DE PRÉ-INSCRIPTION 2024/2025</h1>

        <!-- Message de succès -->
        @if (session('success'))
            <div class="success-message">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Contenu -->
        <div class="content">
            @if (isset($preInscription))
                <!-- Photo -->
                <fieldset>
                    <div class="photo-container">
                        <div class="photo-4x4">
                            @if ($preInscription->fileUpload)
                                <img src="{{ public_path('storage/' . $preInscription->fileUpload) }}" alt="Photo de l'étudiant">
                            @else
                                <span>Aucune photo</span>
                            @endif
                        </div>
                    </div>
                </fieldset>

                <!-- État civil -->
                <fieldset>
                    <h2>ÉTAT CIVIL</h2>
                    <div class="grid">
                        <div>
                            <label>Matricule de l'étudiant :</label>
                            <p>{{ $preInscription->matricule }}</p>
                        </div>
                        <div>
                            <label>Nom :</label>
                            <p>{{ $preInscription->name }}</p>
                        </div>
                        <div>
                            <label>Prénom :</label>
                            <p>{{ $preInscription->surname }}</p>
                        </div>
                        <div>
                            <label>Date de naissance :</label>
                            <p>{{ $preInscription->birth_day }}</p>
                        </div>
                        <div>
                            <label>Lieu de naissance :</label>
                            <p>{{ $preInscription->birth_place }}</p>
                        </div>
                        <div>
                            <label>Ville :</label>
                            <p>{{ $preInscription->city }}</p>
                        </div>
                        <div>
                            <label>Département :</label>
                            <p>{{ $preInscription->departement }}</p>
                        </div>
                        <div>
                            <label>Pays :</label>
                            <p>{{ $preInscription->country }}</p>
                        </div>
                        <div>
                            <label>Sexe :</label>
                            <p>{{ $preInscription->sex }}</p>
                        </div>
                        <div>
                            <label>Nationalité :</label>
                            <p>{{ $preInscription->nationality }}</p>
                        </div>
                        <div>
                            <label>Situation familiale :</label>
                            <p>{{ $preInscription->family_status }}</p>
                        </div>
                        <div>
                            <label>Êtes-vous dans une situation de handicap ? :</label>
                            <p>{{ $preInscription->disabled ? 'Oui' : 'Non' }}</p>
                        </div>
                    </div>
                </fieldset>

                <!-- Niveau scolaire -->
                <fieldset>
                    <h2>Niveau scolaire ou diplôme équivalent</h2>
                    <div class="grid">
                        <div>
                            <label>Année d'obtention :</label>
                            <p>{{ $preInscription->obtaining }}</p>
                        </div>
                        <div>
                            <label>Série :</label>
                            <p>{{ $preInscription->serie }}</p>
                        </div>
                        <div>
                            <label>Mention :</label>
                            <p>{{ $preInscription->mention->name }}</p>
                        </div>
                        <div>
                            <label>École d'obtention :</label>
                            <p>{{ $preInscription->school }}</p>
                        </div>
                        <div>
                            <label>Spécialité :</label>
                            <p>{{ $preInscription->speciality->name }}</p>
                        </div>
                        <div>
                            <label>Statut ou fonction de l'étudiant :</label>
                            <p>{{ $preInscription->statut }}</p>
                        </div>
                        <div>
                            <label>Statut du chef de famille :</label>
                            <p>{{ $preInscription->statutChief }}</p>
                        </div>
                        <div>
                            <label>Continuer vos études à l'étranger ? :</label>
                            <p>{{ $preInscription->study_abroad ? 'Oui' : 'Non' }}</p>
                        </div>
                    </div>
                </fieldset>

                <!-- Financement -->
                <fieldset>
                    <h2>Financement de la formation</h2>
                    <div class="grid">
                        <div>
                            <label>Financement :</label>
                            <p>{{ $preInscription->financement->name }}</p>
                        </div>
                        <div>
                            <label>Mode de paiement :</label>
                            <p>{{ $preInscription->payment_mode->name }}</p>
                        </div>
                    </div>
                </fieldset>

                <!-- Informations personnelles -->
                <fieldset>
                    <h2>Informations personnelles</h2>
                    <div class="grid">
                        <div>
                            <label>Cursus académique des années antérieures :</label>
                            <p></p> <!-- Espace réservé -->
                        </div>
                        <div>
                            <label>2023/2024 :</label>
                            <p>{{ $preInscription->annee_passed1 }}</p>
                        </div>
                        <div>
                            <label>2022/2023 :</label>
                            <p>{{ $preInscription->annee_passed2 }}</p>
                        </div>
                        <div>
                            <label>2021/2022 :</label>
                            <p>{{ $preInscription->annee_passed3 }}</p>
                        </div>
                        <div>
                            <label>2020/2021 :</label>
                            <p>{{ $preInscription->annee_passed4 }}</p>
                        </div>
                        <div>
                            <label>Votre nom complet :</label>
                            <p>{{ $preInscription->full_name }}</p>
                        </div>
                        <div>
                            <label>Numéro de téléphone :</label>
                            <p>{{ $preInscription->phone_number }}</p>
                        </div>
                        <div>
                            <label>Adresse email valide :</label>
                            <p>{{ $preInscription->email }}</p>
                        </div>
                    </div>
                </fieldset>

                <!-- Date et signature -->
                <fieldset>
                    <div class="grid">
                        <div>
                            <label>Date :</label>
                            <p>{{ $preInscription->date }}</p>
                        </div>
                        <div>
                            <label>Signature :</label>
                            <p>{{ $preInscription->signature }}</p>
                        </div>
                    </div>
                </fieldset>
            @else
                <p>{{ $message }}</p>
            @endif
        </div>
    </div>
</body>
</html>