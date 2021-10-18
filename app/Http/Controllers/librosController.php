<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class librosController extends Controller
{
    public function index(){
        return view('pages.libros');
    }

    public function listar(){

                $libros = DB::table('Libros')
                ->join("categorias","categorias.id","=","libros.id_categoria")
                ->select('libros.*', 'categorias.nombre as nombre_cat')
                ->get();

        return $libros;
    }

    public function guardar(Request $request){

        $reglas = [
            'isbn' => 'required',
            'nombre' => 'required|min:3',
            'anio' => 'required|numeric|min:4',
            'paginas' => 'required|numeric',
            'categoria' => 'required',
            'autor' => 'required'
        ];

        $mensajes = [
            'isbn.required' => "El campo ISBN no puede estar vacio.",
            'nombre.required' => "El campo nombre es un valor requerido.",
            'nombre.min' => "El campo requiere por lo minimo 3 caracteres.",
            'anio.required' => "El campo año no puede estar vacio.",
            'anio.numeric' => "Solo se permiten numero para el año.",
            'anio.min' => "El campo AÑO requiere por lo minimo 4 caracteres.",
            'paginas.numeric' => "Solo se permiten numeros en las paginas.",
            'categoria.required' => "El campo categoria es un valor requerido.",
            'autor.required' => "El campo autor es un valor requerido."
            
        ];

        $this->validate($request, $reglas, $mensajes);

        $libro = new Libros();

        $libro -> isbn = $request->isbn;
        $libro -> anio = $request->anio;
        $libro -> no_paginas = $request -> paginas;
        $libro -> nombre = $request->nombre;
        $libro -> descripcion = $request->desc;
        $libro -> id_categoria = 1;
        $libro -> id_autor = 1;

        $libro -> save();
    }
}