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

        ];

        $mensajes = [
            'isbn.required' => "El campo ISB no puede estar vacio."
            
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
        $libro -> id_autor =  $request->id_autor ;

        $libro -> imagen_libro = $request -> file("imagen_libro") -> store('imagenes','public');

        $libro -> save();
    }

    function eliminar (Request $request){
        $libro = Libros::find($request->id);
        $libro -> delete();
    }
}