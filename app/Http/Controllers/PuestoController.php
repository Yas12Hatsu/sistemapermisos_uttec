<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Importar la clase Log
use Illuminate\Validation\Rule;

class PuestoController extends Controller
{
    public function index(Request $req)
    {
        if($req->id){
            $puesto = Puesto::find($req->id);
        }else{
            $puesto = new Puesto();
        }

        return view('puesto', compact('puesto'));
    }

    public function store(Request $req)
    {
        // Validar datos 
        $req->validate([
            'codigo' =>'required|min:4|integer',
            'nombre' =>'required|string|min:1|regex:/^[^0-9]*$/'
        ]);
        
        // Registro del evento
        Log::info('Se ha validado la entrada de datos para guardar un puesto.');

        if($req->id !=0){
            $puesto = Puesto::find($req->id);
        }else{
            $puesto = new Puesto();
        }

        $puesto->codigo = $req->codigo;
        $puesto->nombre = $req->nombre;

        $puesto->save();//insert

        // Registro del evento
        Log::info('Se ha guardado un nuevo puesto.');

        return redirect()->route('puestos.lista');
    }

    public function list()
    {
        $puestos = Puesto::all();

        return view('puestos', compact('puestos'));
    }

    public function delete($id){
        $puesto = Puesto::find($id);
        $puesto->delete();

        // Registro del evento
        Log::info('Se ha eliminado un puesto.');

        return redirect()->route('puestos.lista');
    }
}
