<?php

namespace App\Http\Controllers;

use App\Models\PreInscription;// Modèle pour les préinscriptions
use Illuminate\Support\Facades\Auth;


use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{



    public function download(PreInscription $preInscription)
    {
        // Vérifie si l'utilisateur a déjà une pré-inscription
        if (!PreInscription::where('user_id', Auth::id())->exists()) {
            return redirect()->route('preincription');
        }
        $pdf = Pdf::loadView('pdf.preinscription', compact('preInscription'))
            ->setPaper('a4', 'portrait');
        return $pdf->download('preinscription_' . $preInscription->matricule . '.pdf');
    }

    public function view(PreInscription $preInscription)
    {
        // Vérifie si l'utilisateur a déjà une pré-inscription
        if (!PreInscription::where('user_id', Auth::id())->exists()) {
            return redirect()->route('preincription');
        }
        $pdf = Pdf::loadView('pdf.preinscription', compact('preInscription'))
            ->setPaper('a4', 'portrait');
        return $pdf->stream('preinscription_' . $preInscription->matricule . '.pdf');
    }
}