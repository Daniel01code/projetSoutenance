<?php

namespace App\Http\Controllers;

use App\Models\Cathegory;
use App\Models\Financement;
use App\Models\Mention;
use App\Models\Paiement;
use App\Models\PreInscription; // Modèle corrigé
use App\Models\Specialité;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         // Récupère toutes les préinscriptions sans charger les relations par défaut
         $preinscrits = PreInscription::without('mention', 'speciality', 'financement', 'payment_mode')
             ->latest()
             ->get();
 
         return view('admin.preinscriptions.index', compact('preinscrits'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PreInscription $preInscription) // Injection corrigée
    {
        return view('admin.preinscriptions.show', compact('preInscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   
     public function edit(PreInscription $preInscription) // Injection corrigée
     {
         $finances = Financement::all()->take(4);
         $categories = Cathegory::with('specialités')->get(); // Relation corrigée
         $mentions = Mention::all();
         $familyStatuses = PreInscription::FAMILY_STATUSES; // Constante corrigée
         $sexes = PreInscription::SEXES; // Constante corrigée
         $paiements = Paiement::all();
 
         return view('admin.preinscriptions.edit', compact(
             'preInscription', // Variable corrigée (singulier)
             'categories',
             'mentions',
             'paiements',
             'sexes',
             'familyStatuses',
             'finances'
         ));
     }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PreInscription $preInscription) // Injection corrigée
    {
        $validatedData = $request->validate([
            'matricule' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birth_day' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'departement' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'sex' => 'required|in:masculin,feminin',
            'nationality' => 'nullable|string|max:255',
            'family_status' => 'required|in:Marié,Célibataire',
            'disabled' => 'required|boolean',
            'obtaining' => 'nullable|date',
            'serie' => 'nullable|string|max:255',
            'mention_id' => 'nullable|exists:mentions,id',
            'school' => 'nullable|string|max:255',
            'speciality_id' => 'nullable|exists:specialités,id',
            'statut' => 'nullable|string|max:255',
            'statutChief' => 'nullable|string|max:255',
            'study_abroad' => 'required|boolean',
            'annee_passed1' => 'nullable|string|max:255',
            'annee_passed2' => 'nullable|string|max:255',
            'annee_passed3' => 'nullable|string|max:255',
            'annee_passed4' => 'nullable|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'date' => 'required|date',
            'signature' => 'nullable|string|max:255',
        ]);

        $preInscription->update($validatedData); // Plus besoin de first()

        return redirect()->route('admin.preinscriptions.index')
            ->with('success', 'Les informations ont été mises à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreInscription $preInscription) // Injection corrigée
    {
        $preInscription->delete(); // Plus besoin de first()

        return redirect()->route('admin.preinscriptions.index')
            ->with('success', 'Préinscription supprimée avec succès.');
    }

    //  mehtode pour la gestion des categorie
    
    public function indexCategory()
    {
        $categories = Cathegory::with('specialités')->get(); // Chargement des spécialités associées
        return view('admin.categorie.index', compact('categories')); // Passage des données à la vue
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cathegories,name|max:255',
        ]);

        Cathegory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categorie.index')
            ->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function destroyCategory(Cathegory $cathegory)
    {
        // dd($cathegory);

      // Vérifiez si la catégorie est trouvée
        if (!$cathegory) {
        return redirect()->route('admin.categorie.index')->with('error', 'Catégorie non trouvée.');
        }

        // Supprimer la catégorie
        $cathegory->delete();

         // Rediriger avec un message de succès
        return redirect()->route('admin.categorie.index')->with('success', 'Catégorie supprimée avec succès.');    
    
    }

    public function updateCategory(Request $request, Cathegory $cathegory)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|unique:cathegories,name,' . $cathegory->id . '|max:255',
        ]);

        // Mise à jour de la catégorie
        $cathegory->update([
            'name' => $request->name,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('admin.categorie.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    //  mehtode pour la gestion des Specialité

        public function indexSpeciality()
    {
        $specialities = Specialité::with('cathegory')->get(); // Charge les catégories associées
        $categories = Cathegory::all(); // Pour le formulaire de création
        return view('admin.speciality.index', compact('categories', 'specialities'));
    }

    public function storeSpeciality(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:specialités,name|max:255',
            'cathegory_id' => 'required|exists:cathegories,id',
        ]);

        Specialité::create($data);

        return redirect()->route('admin.speciality.index')
            ->with('success', 'Spécialité ajoutée avec succès.');
    }

    public function destroySpeciality(Specialité $speciality)
    {
        // dd($speciality);
        if (!$speciality)
        {
            return redirect()->route('admin.speciality.index')->with('error', 'Catégorie non trouvée.');
        }

        $speciality->delete(); 
           
        return redirect()->route('admin.speciality.index')
            ->with('success', 'Spécialité supprimée avec succès.');     

    }

    public function updateSpeciality(Request $request, Specialité $speciality)
    {
        $request->validate([
            'name' => 'required|unique:specialités,name,' . $speciality->id . '|max:255',
            'cathegory_id' => 'required|exists:cathegories,id',
        ]);
    
        // dd($request);
        
        $speciality->update([
            'name' => $request->name,
            'cathegory_id' => $request->cathegory_id,
        ]);
        
        return redirect()->route('admin.speciality.index')->with('success', 'Spécialité mise à jour avec succès.');
    }
}
