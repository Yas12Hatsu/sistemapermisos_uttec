@extends('adminlte::page')

@section('title', 'Agregar profesor')

@section('content_header')
    <link href="http://mx.geocities.com/mipagina/favicon.ico" type="image/x-icon" rel="shortcut icon" />

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    @stop

    
@section('content')

    <div class="container mt-5 mx-3 my-3"> <!-- Agregamos las clases "mx-3" y "my-3" para agregar margen horizontal y vertical -->
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div style=" background-color:#1466C3; color:#fff"  class="bg text-white p-3 mb-3 rounded-top">
                    <h2 class="text-center animate__animated animate__backInDown">Datos de profesor</h2>
                </div>
                <form class="formulario-aceptar" action="{{ route('profesor.guardar')}}" method="POST" class="shadow p-3 mb-5 bg-white rounded" style="animation: fadeInUp;">
                    @csrf
                    <input type="hidden" name="id" value="{{$profesor->id}}">

                        <div class="form-group row animate__animated animate__backInDown">
                            <label for="numero" class="col-sm-3 col-form-label">Número:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-animation" id="numero" name="numero" value="{{$profesor->numero =='' ?  old('numero') :$profesor->numero}}" >
                                <!--mostrar el error de validacion -->
                                @error('numero')
                                <small style="color: red" > {{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row animate__animated animate__backInDown">
                            <label class="col-sm-3 col-form-label" for="nombre">Nombre: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-animation" id="nombre" name="nombre" value="{{$profesor->nombre =='' ?  old('nombre') :$profesor->nombre}}" >
                                <!--mostrar el error de validacion -->
                                @error('nombre')
                                <small style="color: red" > {{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row animate__animated animate__backInDown">
                            <label class="col-sm-5 col-form-label" for="numero">Horas asignadas: </label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control input-animation" id="horas_asignadas" name="horas_asignadas" value="{{$profesor->horas_asignadas ==''? old('horas_asignadas') :$profesor->horas_asignadas}}" >
                                <!--mostrar el error de validacion -->
                                @error('horas_asignadas')
                                <small style="color: red" > {{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row animate__animated animate__backInDown">
                            <label class="col-sm-5 col-form-label" for="numero">Dias económicos: </label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control input-animation" id="dias_economicos_correspondientes" name="dias_economicos_correspondientes" value="{{$profesor->dias_economicos_correspondientes ==''? old('dias_economicos_correspondientes') :$profesor->dias_economicos_correspondientes}}" >
                                <!--mostrar el error de validacion -->
                                @error('dias_economicos_correspondientes')
                                <small style="color: red" > {{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row animate__animated animate__backInDown">
                            <label class="col-sm-3 col-form-label" for="id_usuario">Usuario: </label>
                            <div class="col-sm-9">
                                <select name="id_usuario" class="form-control input-animation">
                                @foreach ($users as $user)
                                <option value="{{$user->id}}"{{$user->id == $profesor->id_usuario ? 'selected':''}}>{{$user->name}}</option>
                                @endforeach
                                </select>
                                <!--mostrar el error de validacion -->
                                @error('id_usuario')
                                <small style="color: red" > {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row animate__animated animate__backInDown">
                            <label class="col-sm-3 col-form-label" for="id_division">División: </label>
                            <div class="col-sm-9">
                                <select name="id_division" class="form-control input-animation">
                                @foreach ($divisiones as $division)
                                <option value="{{$division->id}}"{{$division->id==$profesor->id_division ? 'selected':''}}>{{$division->nombre}}</option>
                                @endforeach
                                </select>
                                <!--mostrar el error de validacion -->
                                @error('id_division')
                                <small style="color: red" > {{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row animate__animated animate__backInDown">
                            <label class="col-sm-3 col-form-label" for="id_puesto">Puesto: </label>
                            <div class="col-sm-9">
                                <select name="id_puesto" class="form-control input-animation">
                                @foreach ($puestos as $puesto)
                                <option value="{{$puesto->id}}"{{$puesto->id==$profesor->id_puesto ? 'selected':''}}>{{$puesto->nombre}}</option>
                                @endforeach
                            </select>
                            <!--mostrar el error de validacion -->
                                @error('id_puesto')
                                <small style="color: red" > {{$message}}</small>
                                @enderror
                            </div>
                        </div>  
                        <div>
                        <center>
                            <button id="saberBtn" style=" background-color:#1466C3; color:#fff"  type="submit" class="btn btn-primary animate__animated animate__bounce">Aceptar</button>
                        </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection


    @section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formulario-aceptar').submit(function(e){
    e.preventDefault();

    Swal.fire({
  icon: "success",
  title: "Registro Guardado",
  showConfirmButton: false,
  timer: 2500
});
this.submit();
});
</script>

@stop


    @section('css')
    <style>

body{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
         line-height: 1.5;
  
        }
        .input-animation {
            border: none;
            border-bottom: 1px solid #ccc; /* Línea de fondo */
            transition: all 0.3s ease-in-out; /* Transición suave */
            cursor: pointer; /* Cambia el cursor a una manita al pasar sobre el input */
        }

        .input-animation:focus {
            border-bottom-color: #80bdff; /* Cambio de color al enfocar */
            box-shadow: none; /* Quita la sombra al enfocar */
            outline: none; /* Quita el borde al enfocar */
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .btn:hover {
         transform: scale(1.1);
        }

    </style>
@stop
