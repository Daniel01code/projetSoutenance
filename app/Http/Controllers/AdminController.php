<?php

namespace App\Http\Controllers;

use App\Models\Cathegory;
use App\Models\Financement;
use App\Models\Mention;
use App\Models\Paiement;
use App\Models\pre_inscriptions;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    // public function edit(pre_inscriptions $pre_inscriptions)
    // {
    //     return view('admin.preinscriptions.edit', [

    //         'preInscription' => $pre_inscriptions->first()]);
    // }

    // public function edits(pre_inscriptions $pre_inscriptions)
    // {
    //     // dd($pre_inscriptions->first());
    //     //fiancement

    //     $finances = Financement::all()->take(4);

    //     // Récupérer toutes les catégories et leurs spécialités
    //     $categories = Cathegory::with('specialities')->get();

    //     // Récupérer toutes les mentions
    //     $mentions = Mention::all();

    //     $familyStatuses = pre_inscriptions::FAMILY_STATUSES;

    //     $sexes = pre_inscriptions::SEXES;

    //     // mode de paiement

    //     $paiements = Paiement::all();

    //     return view('admin.preinscriptions.edit', [
    //         'preInscription' => $pre_inscriptions->first() // Passez l'objet complet
    //     ]);
    // }
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
        // Récupérer l'étudiant par son ID
        // $preInscription = Pre_inscriptions::findOrFail($id);

        // Mettre à jour les données
        $pre_inscriptions->first()->update($validatedData);
       return redirect()->route('admin.preinscriptions.index')->with('success', 'Les informations ont été mises à jour avec succès.');
        // $pre_inscriptions->first()->update();
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
}
