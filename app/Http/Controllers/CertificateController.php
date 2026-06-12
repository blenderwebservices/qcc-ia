<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        return view('certificates.search');
    }

    public function search(Request $request)
    {
        $request->validate([
            'roc' => 'required|string',
        ]);

        $query = $request->roc;

        $certificate = Certificate::where('roc', 'like', "%{$query}%")
            ->orWhere('organization', 'like', "%{$query}%")
            ->first();

        if (!$certificate) {
            return back()
                ->withErrors(['error' => 'No se encontró ningún certificado con el identificador o nombre ingresado.'])
                ->withInput();
        }

        return view('certificates.show', compact('certificate'));
    }
}
