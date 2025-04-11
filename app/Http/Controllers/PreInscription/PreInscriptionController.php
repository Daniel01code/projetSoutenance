<?php

namespace App\Http\Controllers\PreInscription;

use App\Http\Controllers\Controller;
use App\Models\Cathegory;
use App\Models\Financement;
use App\Models\Mention;
use App\Models\Paiement;
use App\Models\PreInscription;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PreInscriptionController extends Controller
{
    public function show()
    {
        
        // Récupérer l'ID de l'utilisateur connecté
        $userId = auth()->user()->id;

        // Récupérer les données de pré-inscription associées à l'utilisateur
        $preInscription = PreInscription::where('user_id', $userId)->first();

        // Vérifiez si des données existent, sinon renvoyez une vue avec un message approprié
        if ($preInscription) {
            return view('preinscription.viewPreincriptionValidation', compact('preInscription'));
        } else {
            return redirect()->route('preincription');
        }
    }
    
    public function preinscription()
    {

        // Vérifie si l'utilisateur a déjà une pré-inscription
        if (PreInscription::where('user_id', Auth::id())->exists()) 
        {
            return redirect()->route('dashboard')->with('message', 'Vous avez déjà complété votre pré-inscription.');
        }

        $userId = auth()->user()->id; // Récupérer l'ID de l'utilisateur

        // Financement
        $finances = Financement::all()->take(4);
    
        // Récupérer toutes les catégories et leurs spécialités
        $categories = Cathegory::with('specialités')->get();
    
        // Récupérer toutes les mentions
        $mentions = Mention::all();
    
        $familyStatuses = PreInscription::FAMILY_STATUSES;
        $sexes = PreInscription::SEXES;
    
        // Mode de paiement
        $paiements = Paiement::all();

        return view('preinscription.preinscription', compact('userId','categories','mentions','paiements','sexes','familyStatuses','finances'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'fileUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birth_day' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'sex' => 'required|in:masculin,feminin',
            'nationality' => 'required|string|max:255',
            'family_status' => 'required',
            'disabled' => 'required|boolean',
            'obtaining' => 'required|date',
            'serie' => 'required|string|max:255',
            'mention_id' => 'required|exists:mentions,id',
            'school' => 'required|string|max:255',
            'speciality_id' => 'required|exists:specialités,id',
            'statut' => 'required|string|max:255',
            'statutChief' => 'required|string|max:255',
            'financement_id' => 'required|exists:financements,id',
            'payment_mode_id' => 'required|exists:paiements,id',
            'study_abroad' => 'required|boolean',
            'annee_passed1' => 'required|string|max:255',
            'annee_passed2' => 'required|string|max:255',
            'annee_passed3' => 'required|string|max:255',
            'annee_passed4' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'signature' => 'nullable|string|max:255',
        ]);
    
        $anneeMois = date('Ym');
        $idUtilisateur = auth()->user()->id;
        $lettreAleatoire = chr(rand(65, 90));
        $matricule = "ETU-{$anneeMois}-{$lettreAleatoire}-{$idUtilisateur}";
    
        $validated['matricule'] = $matricule;
    
        PreInscription::create($validated);
    
        return redirect()->route('dashboard')->with('message', 'Votre pré-inscription a été enregistrée avec succès.');
    }
    // Méthode pour afficher le formulaire de mise à jour
    public function edit(PreInscription $preInscription) // Utilisation du route model binding
    {
        // Vérifie si l'utilisateur a déjà une pré-inscription
        if (!PreInscription::where('user_id', Auth::id())->exists()) 
        {
            return redirect()->route('preincription');
        }
        $idAuth = intval(Auth::id()); // Point-virgule ajouté, "intintval" corrigé en "intval"
        $user_id = intval($preInscription->user_id); // Point-virgule ajouté, "intintval" corrigé en "intval"
        
        if ($idAuth !== $user_id && !Auth::user()->isAdmin()) {
            abort(403, 'Vous n’êtes pas autorisé à modifier cette préinscription.');
        }
        // Récupération des données pour les listes déroulantes
        $finances = Financement::all()->take(4);
        $categories = Cathegory::with('specialités')->get(); // Assurez-vous que le modèle est correct
        $mentions = Mention::all();
        $familyStatuses = PreInscription::FAMILY_STATUSES;
        $sexes = PreInscription::SEXES;
        $paiements = Paiement::all();

        return view('preinscription.edit', compact(
            'preInscription', // Injecté via route model binding
            'finances',
            'categories',
            'mentions',
            'familyStatuses',
            'sexes',
            'paiements'
        ));
    }

    // Méthode pour traiter la mise à jour
    public function update(Request $request, PreInscription $preInscription)
    {
        // Vérification des autorisations
        $idAuth = intval(Auth::id());
        $user_id = intval($preInscription->user_id);

        if ($idAuth !== $user_id && !Auth::user()->isAdmin()) {
            abort(403, 'Vous n’êtes pas autorisé à modifier cette préinscription.');
        }

        // Validation des champs modifiables (exclut matricule et user_id)
        $validated = $request->validate([
            'fileUpload' => 'nullable|image|max:2048',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birth_day' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'sex' => 'required|in:masculin,feminin',
            'nationality' => 'required|string|max:255',
            'family_status' => 'required|in:marie,celibataire',
            'disabled' => 'required|boolean',
            'obtaining' => 'required|date',
            'serie' => 'required|string|max:255',
            'mention_id' => 'required|integer|exists:mentions,id',
            'school' => 'required|string|max:255',
            'speciality_id' => 'required|integer|exists:specialités,id',
            'statut' => 'required|string|max:255',
            'statutChief' => 'required|string|max:255',
            'study_abroad' => 'required|boolean',
            'financement_id' => 'required|integer|exists:financements,id',
            'payment_mode_id' => 'required|integer|exists:paiements,id',
            'annee_passed1' => 'required|string|max:255',
            'annee_passed2' => 'required|string|max:255',
            'annee_passed3' => 'required|string|max:255',
            'annee_passed4' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'signature' => 'nullable|string|max:255',
        ]);

        // Mise à jour de l'enregistrement (matricule et user_id ne sont pas inclus dans $validated)
        $preInscription->update($validated);

        if (Auth::user()->isAdmin()) {
           
            
            return redirect()->route('admin.preinscriptions.index')
                ->with('success', 'Etudiant mise à jour avec succès.');
        }else{

            return redirect()->route('viewPreinscriptionValidation')
                ->with('success', 'Mise à jour de ma réinscription avec succès.');
        }

    }

}
