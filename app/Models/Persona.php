<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombre',
        'dni',
        'pdf_path',
        'codigo_unico'
    ];
}