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

        $certificate = Certificate::where('roc', $request->roc)->first();

        if (!$certificate) {
            return back()
                ->withErrors(['error' => 'Identificador ROC incorrecto o no registrado.'])
                ->withInput();
        }

        return view('certificates.show', compact('certificate'));
    }
}
