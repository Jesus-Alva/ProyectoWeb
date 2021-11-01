<?php

namespace App\Http\Controllers;

use App\Models\autores;
use Illuminate\Http\Request;

class autores_controller extends Controller
{
    public function listar(){
        return autores::all();
    }
}
