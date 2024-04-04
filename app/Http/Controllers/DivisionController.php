<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Importar la clase Log

class DivisionController extends Controller
{
    public function index(Request $req)
    {
        // Registro del evento
        Log::info('Se accedió a la página de edición de división.');

        if($req->id){
            $division = Division::find($req->id);
        }else{
            $division = new Division();
        }

        return view('division', compact('division'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'codigo' =>'required|min:4|integer',
            'nombre' => 'required|string|min:1|regex:/^[^0-9]*$/',
            Rule::unique('puesto','nombre'),
        ]);

        if($req->id !=0){
            $division= Division::find($req->id);
        }else{
            $division = new Division();
        }

        $division->codigo = $req->codigo;
        $division->nombre = $req->nombre;

        $division->save();//insert

        // Registro del evento
        Log::info('Se ha guardado una nueva división.');

        return redirect()->route('divisiones.lista');
    }

    public function list()
    {
        // Registro del evento
        Log::info('Se accedió a la lista de divisiones.');

        $divisiones = Division::all();

        return view('divisiones', compact('divisiones'));
    }

    public function delete($id){
        $division = Division::find($id);
        $division->delete();

        // Registro del evento
        Log::info('Se ha eliminado una división.');

        return redirect()->route('divisiones.lista');
    }
}
