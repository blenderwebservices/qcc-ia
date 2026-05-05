<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function generatePdf(Request $request)
    {
        $data = $request->validate([
            'score' => 'required|integer',
            'level' => 'required|string',
            'status' => 'required|string',
            'recommendation' => 'required|string',
            'questions' => 'required|array',
            'trainings' => 'required|array',
            'gauge_image' => 'required|string'
        ]);

        $pdf = Pdf::loadView('pdf.diagnostico', $data);
        return $pdf->download('Reporte_Diagnostico_SGC.pdf');
    }
}
