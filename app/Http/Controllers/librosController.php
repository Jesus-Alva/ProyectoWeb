<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class librosController extends Controller
{
    public function index($texto){
        return view('Hola')
            ->with('texto',$texto);
    }
}
