<?php

use Illuminate\Support\Facades\Route;
use App\Models\Persona;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/ver/{codigo}', function($codigo){
    $persona = Persona::where('codigo_unico', $codigo)->firstOrFail();
    return response()->file(storage_path('app/public/'.$persona->pdf_path));
})->name('persona.ver');

Route::get('/qr/{codigo}', function($codigo){
    $url = route('persona.ver', $codigo);
    return QrCode::size(300)->generate($url);
})->name('persona.qr');

Route::get('/admin', function () {
    return view('admin');
});

use App\Http\Controllers\PersonaController;

Route::post('/guardar', [PersonaController::class, 'store'])->name('persona.store');
Route::get('/admin/lista', [PersonaController::class, 'index'])->name('persona.index');