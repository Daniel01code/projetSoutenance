<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $pdf = Pdf::loadView('pdf.document')
            ->setPaper('a4', 'portrait');

        return $pdf->download('document.pdf');
    }
}