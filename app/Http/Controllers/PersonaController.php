<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Str;

class PersonaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'dni' => 'required',
            'certificado' => 'required|mimes:pdf'
        ]);

        $codigo = Str::uuid();

        $pdfPath = $request->file('certificado')
                    ->store('certificados', 'public');

        Persona::create([
            'nombre' => $request->nombre,
            'dni' => $request->dni,
            'pdf_path' => $pdfPath,
            'codigo_unico' => $codigo
        ]);

        return redirect()->route('persona.qr', $codigo);
    }
    public function index()
{
    $personas = Persona::latest()->get();
    return view('admin_lista', compact('personas'));
}
}

