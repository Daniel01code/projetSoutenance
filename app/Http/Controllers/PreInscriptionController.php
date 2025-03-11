<?php

namespace App\Http\Controllers;

use App\Models\pre_inscription;
use Illuminate\Http\Request;

class PreInscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(pre_inscription $pre_inscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pre_inscription $pre_inscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pre_inscription $pre_inscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pre_inscription $pre_inscription)
    {
        //
    }
    public function preinscription()
    {

        return view('preincription.preincription');        
    }
}
