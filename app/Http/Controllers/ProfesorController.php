<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Profesor;
use App\Models\Puesto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Importar la clase Log
use Illuminate\Validation\Rule;

class ProfesorController extends Controller
{
    public function index(Request $req){

        $users = User::all();
        $puestos = Puesto::all();
        $divisiones = Division::all();

        if($req->id){
            $profesor = Profesor::find($req->id);
        }else{
            $profesor = new Profesor();
        }

        return view('profesor', compact('users','puestos','divisiones','profesor'));
    }

    public function store(Request $req)
    {

        $req->validate([
            'numero' =>'required|numeric|', //(<- si es telefono ) otra forma de 10 digitos(regex:/^[0-9]{10}$/) min:4|integer (si es un numero normal)
            'nombre' => 'required|string|min:1|regex:/^[^0-9]*$/',
            'horas_asignadas' =>'required|numeric|min:1',
            'dias_economicos_correspondientes' => 'required|numeric|min:1|max:30',
            'id_usuario' => 'required',
            'id_puesto' => 'required',
            'id_division' => 'required',
            
        ]);

        // Registro del evento
        Log::info('Se ha validado la entrada de datos para guardar un profesor.');

        if($req->id !=0){
            $profesor = Profesor::find($req->id);
        }else{
            $profesor = new Profesor();
        }

        $profesor->numero = $req->numero;
        $profesor->nombre = $req->nombre;
        $profesor->horas_asignadas = $req->horas_asignadas;
        $profesor->dias_economicos_correspondientes = $req->dias_economicos_correspondientes;
        $profesor->id_usuario = $req->id_usuario;
        $profesor->id_puesto = $req->id_puesto;
        $profesor->id_division = $req->id_division;

        $profesor->save();//insert

        // Registro del evento
        Log::info('Se ha guardado un nuevo profesor.');

        return redirect()->route('profesores.lista');
    }

    public function list()
    {
        $profesores = Profesor::
                join('puesto','profesores.id_puesto','=','puesto.id')
                ->join('users','profesores.id_usuario','=','users.id')
                ->select('profesores.*','puesto.nombre as nombre_puesto', 'users.name as nombre_usuario') 
                ->get();

        return view('profesores', compact('profesores'));
    }

    public function delete($id){
        $profesor = Profesor::find($id);
        $profesor->delete();

        // Registro del evento
        Log::info('Se ha eliminado un profesor.');

        return redirect()->route('profesores.lista');
    }
}