<?php

namespace App\Http\Controllers;

use App\Models\autores;
use Illuminate\Http\Request;

class autoresController extends Controller
{
    public function listar(){
        return autores::all();
    }
}
