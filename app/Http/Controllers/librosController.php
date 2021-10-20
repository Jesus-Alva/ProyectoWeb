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
                ->join("autor","autor.id","=","libros.id_autor")
                ->select('libros.*', 'categorias.nombre as nombre_cat','autor.nombre as nombre_autor')
                ->get();

        return $libros;
    }

    public function guardar(Request $request){

        $reglas = [
            'isbn' => 'required',
            'nombre' => 'required|min:3',
            'anio' => 'required|numeric|min:1900',
            'no_paginas' => 'required|numeric|min:100',
            'autor' => 'required'
        ];

        $mensajes = [
            'isbn.required' => "El campo ISBN no puede estar vacio.",
            'nombre.required' => "El campo nombre es un valor requerido.",
            'nombre.min' => "El campo requiere por lo minimo 3 caracteres.",
            'anio.required' => "El campo año no puede estar vacio.",
            'anio.numeric' => "Solo se permiten numero para el año.",
            'anio.min' => "El campo AÑO requiere un dato mas reciente.",
            'no_paginas.required' => "Ingresa un numero de paginas.",
            'no_paginas.numeric' => "Solo se permiten numeros en las paginas.",
            'no_paginas.min' => "Solo se permiten 3 o mas caracteres en las paginas",
            //'categoria.required' => "El campo categoria es un valor requerido.",
            'autor.required' => "El campo autor es un valor requerido."
            
        ];

        $this->validate($request, $reglas, $mensajes);
        
        
        if($request -> id == null || $request -> id == 0){
            $libro = new Libros();
        }else{
            $libro = Libros::find($request->id);
        }

        $libro -> isbn = $request->isbn;
        $libro -> anio = $request->anio;
        $libro -> no_paginas = $request->no_paginas;
        $libro -> nombre = $request->nombre;
        $libro -> descripcion = $request->descripcion;
        $libro -> id_categoria = $request->id_categoria;
        $libro -> id_autor = 1;

        $libro -> save();
    }

    function eliminar (Request $request){
        $libro = Libros::find($request->id);
        $libro -> delete();
    }
}