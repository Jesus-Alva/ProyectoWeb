<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoriasController extends Controller
{

    public function index(){
        return view('pages.categorias');
    }
    
    public function listar(){
        return categorias::all();
        $categorias = DB::table('categorias')
                ->select('libros.*')
                ->get();

        return $categorias;
    }

    public function guardar(Request $request){

        $reglas = [
            'codigo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
        ];

        $mensajes = [
            
            'codigo.required' => 'El campo codigo no puede estar vacio.',
            'nombre.required' => "El campo nombre no puede estar vacio.",
            'descripcion.required' => "Se necesita una breve descripción.",
            
        ];

        $this->validate($request, $reglas, $mensajes);

        if($request -> id == null || $request -> id == 0){
            $categorias = new categorias();
        }else{
            $categorias = categorias::find($request->id);
        }

        $categorias -> codigo = $request->codigo;
        $categorias -> nombre = $request->nombre;
        $categorias -> descripcion = $request->descripcion;


        $categorias -> save();
    }

    function eliminar (Request $request){
        $libro = categorias::find($request->id);
        $libro -> delete();
    }

    
}
