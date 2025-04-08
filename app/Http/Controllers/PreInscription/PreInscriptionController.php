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
            return view('preinscription.viewPreincriptionValidation')->with('message', 'Aucune pré-inscription trouvée pour cet utilisateur.');
        }
    }
    
    public function preinscription()
    {
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
            'phone_number' => 'required|string|max:15',
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
    public function download ()
    {

    }
}
