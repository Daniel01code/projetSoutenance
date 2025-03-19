<?php

namespace App\Http\Controllers;

use App\Models\Cathegory;
use App\Models\Financement;
use App\Models\Mention;
use App\Models\Paiement;
use App\Models\pre_inscriptions;
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

        return view('admin.preinscriptions.index', ['preinscrits' => pre_inscriptions::without('mention', 'speciality', 'financement', 'payment_mode')->latest()->get()]);
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
    public function show(pre_inscriptions $pre_inscriptions)
    {
        // dd($pre_inscriptions->first());
        return view('admin.preinscriptions.show', ['preInscription' => $pre_inscriptions->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function edit(pre_inscriptions $pre_inscriptions)
    {

        $finances = Financement::all()->take(4);

        // Récupérer toutes les catégories et leurs spécialités
        $categories = Cathegory::with('specialities')->get();

        // Récupérer toutes les mentions
        $mentions = Mention::all();

        // dd($mentions);

        $familyStatuses = pre_inscriptions::FAMILY_STATUSES;

        $sexes = pre_inscriptions::SEXES;

        // mode de paiement

        $paiements = Paiement::all();

        $pre_inscription = $pre_inscriptions->first();
        // dd($pre_inscriptions->first());
        return view('admin.preinscriptions.edit', compact(
            'pre_inscription',
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
    public function update(Request $request, pre_inscriptions $pre_inscriptions)
    {


        // Validation des données du formulaire
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

        // dd($validatedData);
        $pre_inscriptions->first()->update($validatedData);
       return redirect()->route('admin.preinscriptions.index')->with('success', 'Les informations ont été mises à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pre_inscriptions $pre_inscriptions)
    {

        $pre_inscriptions->first()->delete();

        // Redirection avec un message de succès
        return redirect()->route('admin.preinscriptions.index')->with('success', 'Préinscription supprimée avec succès.');
    }

    //  mehtode pour la gestion des categorie
    public function indexCategory()
    {

        $cathegories = Cathegory::with('specialities')->get();
        // dd($cathegories);

        return view('admin.categorie.index', compact('cathegories'));
    }
    public function storeCategory(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|unique:cathegories,name|max:255',
        ]);

        // Création de la nouvelle catégorie
        Cathegory::create([
            'name' => $request->name,
        ]);

        // Rediriger vers la même page avec un message de succès
        return redirect()->route('admin.categorie.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function destroyCategory(Cathegory $cathegory)
    {
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

        $specialities = Specialité::all();
        $categories = Cathegory::latest()->paginate(10);

        // dd($specialities);

        return view('admin.speciality.index', compact('categories','specialities'));
    }
    public function storeSpeciality(Request $request)
    {
        // Validation des données
        $data = $request->validate([
            'name' => 'required|unique:cathegories,name|max:255',
            'cathegory_id' => 'required|exists:cathegories,id',
        ]);

        // Création de la nouvelle catégorie
        Specialité::create($data);

        // Rediriger vers la même page avec un message de succès
        return redirect()->route('admin.speciality.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function destroySpeciality(Specialité $specialité)
    {

      // Vérifiez si la catégorie est trouvée
        if (!$specialité) {
        return redirect()->route('admin.speciality.index')->with('succes', 'specialité non trouvée.');
        }
        $specialité->delete();

        if($specialité->delete()){

            return redirect()->route('admin.speciality.index')->with('success', 'spécialité supprimée avec succès.');    
        }
         // Rediriger avec un message de succès
    
    }


    public function updateSpeciality(Request $request, Cathegory $cathegory)
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
}
