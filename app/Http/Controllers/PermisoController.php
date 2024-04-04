<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Importar la clase Log
use Illuminate\Validation\Rule;

class PermisoController extends Controller
{
    public function modify(Request $req){

        $permiso = Permiso::find($req->id);

        $permiso->estado = $req->estado; //P = Pendientes, R=Rechazados, A=Autorizados
        $permiso->observaciones= $req->observaciones;

        $permiso->save();

        // Registro del evento
        Log::info('Se ha modificado el estado de un permiso.');

        return "Ok";

    }


    public function store(Request $req)
    {

        if($req->id != 0){
            $permiso = Permiso::find($req->id);
        }
        else{
            $profesor = Profesor::where('id_usuario',$req->id_usuario)->first();

            $permiso = new Permiso();
            $permiso->estado        = 'P';
            $permiso->id_profesor   = $profesor->id;
        }

        $permiso->fecha         = $req->fecha;
        $permiso->motivo        = $req->motivo;
        
        $permiso->save();

        // Registro del evento
        Log::info('Se ha guardado un nuevo permiso.');

        return "Okey";
    }


    public function list(Request $req){
        $permiso = Permiso:: join('profesores','profesores.id','=','permisos.id_profesor')
                            ->where('id_usuario',$req->id_usuario)
                            ->select('permisos.*','profesores.nombre as nombre_profesor')
                            ->get();
                            

        return $permiso;
    }


    public function index(Request $req){

        $permiso = Permiso::find($req->id);
        
        return $permiso;

    }
    

    public function delete(Request $req){
        $permiso = Permiso::find($req->id);
        $permiso->delete();
        
        // Registro del evento
        Log::info('Se ha eliminado un permiso.');

        return "Okey";
    }


    public function listl(Request $req){
        $permisos = Permiso:: join('profesores','profesores.id','=','permisos.id_profesor')  
                            ->select('permisos.*','profesores.nombre as nombre_profesor')
                            ->where('permisos.estado', 'P') // Mostrar solo estado igual a 'P'
                            ->get();

        return view ('permisos', compact('permisos'));
    }


    public function indexl(Request $req){

     
  
        if($req->id){
            $permiso = Permiso::find($req->id);
        }else{
            $permiso = new Permiso();
        }

        return view('permiso', compact('permiso'));
    }

    public function storel(Request $req)
    {
        if($req->id !=0){
            $permiso = Permiso::find($req->id);
        }else{
            $permiso = new Permiso();
        }

        $permiso->estado        = $req->estado;

        $permiso->observaciones        = $req->observaciones;
        
        $permiso->save();

        // Registro del evento
        Log::info('Se ha guardado un permiso desde la lista.');

        return redirect()->route('permisos.lista');
    }

    public function autorizar(Request $req)
    {
      
        $permiso = Permiso::find($req->id);

        $permiso->estado = 'A';//P = Pendientes, R=Rechazados, A=Autorizados
        $permiso->observaciones= $req->observaciones;

        $permiso->save();

        // Registro del evento
        Log::info('Se ha autorizado un permiso.');

        return redirect()->route('permisos.lista');
    }

    public function rechazar(Request $req)
    {
        if($req->id !=0){
            $permiso = Permiso::find($req->id);
        }else{
            $permiso = new Permiso();
        }

        $permiso->estado        = 'R';
        $permiso->observaciones= $req->observaciones;
    
        $permiso->save();

        // Registro del evento
        Log::info('Se ha rechazado un permiso.');

        return redirect()->route('permisos.lista');
    }
}
