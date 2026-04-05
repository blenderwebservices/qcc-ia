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
            'access_password' => 'required|string',
        ]);

        $certificate = Certificate::where('roc', $request->roc)
            ->where('access_password', $request->access_password)
            ->first();

        if (!$certificate) {
            return back()
                ->withErrors(['error' => 'Identificador ROC o contraseña incorrectos.'])
                ->withInput();
        }

        return view('certificates.show', compact('certificate'));
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'forgot_roc' => 'required|string',
        ]);

        $certificate = Certificate::where('roc', $request->forgot_roc)->first();

        if ($certificate && $certificate->contact_email) {
            \Illuminate\Support\Facades\Mail::to($certificate->contact_email)
                ->send(new \App\Mail\CertificatePasswordReminder($certificate));
        }

        return back()->with('status', 'Si el identificador ROC existe y tiene un correo asociado, se han enviado las instrucciones para recordar la contraseña.');
    }
}
