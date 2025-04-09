<?php

namespace App\Http\Controllers;

use App\Models\PreInscription;// Modèle pour les préinscriptions

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{



    public function download(PreInscription $preInscription)
    {
        $pdf = Pdf::loadView('pdf.preinscription', compact('preInscription'))
            ->setPaper('a4', 'portrait');
        return $pdf->download('preinscription_' . $preInscription->matricule . '.pdf');
    }

    public function view(PreInscription $preInscription)
    {
        $pdf = Pdf::loadView('pdf.preinscription', compact('preInscription'))
            ->setPaper('a4', 'portrait');
        return $pdf->stream('preinscription_' . $preInscription->matricule . '.pdf');
    }
}