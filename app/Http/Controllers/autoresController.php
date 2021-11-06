<?php

namespace App\Http\Controllers;

use App\Models\autores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class autoresController extends Controller
{
    public function index(){
        return view('pages.autor');
    }
    public function listar(){
        return autores::all();
        $autores = DB::table('autores')
                ->select('libros.*')
                ->get();

        return $autores;
    }
    public function guardar(Request $request){

        $reglas = [
            'codigo' => 'required',
            'nombre' => 'required'
        ];

        $mensajes = [
            
            'codigo.required' => 'El campo codigo no puede estar vacio.',
            'nombre.required' => "El campo nombre no puede estar vacio."
            
        ];

        $this->validate($request, $reglas, $mensajes);

        if($request -> id == null || $request -> id == 0){
            $autor = new autores();
        }else{
            $autor = autores::find($request->id);
        }

        $autor -> codigo = $request->codigo;
        $autor -> nombre = $request->nombre;


        $autor -> save();
    }
    function eliminar (Request $request){
        $libro = autores::find($request->id);
        $libro -> delete();
    }
}
