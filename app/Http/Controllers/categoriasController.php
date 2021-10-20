<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
    public function listar(){
        return categorias::all();
    }
}
