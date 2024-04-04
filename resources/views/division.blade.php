@extends('adminlte::page')

@section('title', 'Agregar división')
    
@section('content_header')
    <link href="http://mx.geocities.com/mipagina/favicon.ico" type="image/x-icon" rel="shortcut icon" />

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    @stop

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div style=" background-color:#1466C3; color:#fff"  class="bg text-white p-3 mb-3 rounded-top  ">
                <h2 class="text-center animate__animated animate__backInDown">Datos de división</h2>
            </div>
           
                <form class="formulario-aceptar " action="{{ route('division.guardar')}}" method="POST" class="shadow p-3 mb-5 bg-white" style="animation: fadeInUp" style="border-radius: 10px" >
                 @csrf
                <input type="hidden" name="id" value="{{$division->id}}">
            
                <div class="form-group row animate__animated animate__backInDown " >
                    <label for="codigo" class="col-sm-3 col-form-label">Código: </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control input-animation" id="codigo" name="codigo"  value="{{$division->codigo =='' ?  old('codigo') :$division->codigo}}" >
                     <!--mostrar el error de validacion -->
                         @error('codigo')
                        <small style="color: red" > {{$message}}</small>
                        @enderror  
                </div>
                </div>
                <div class="form-group row animate__animated animate__backInDown ">
                    <label class="col-sm-3 col-form-label" for="nombre">Nombre: </label>
                    <div class="col-sm-9">
                    <input type="nombre" class="form-control input-animation" id="nombre" name="nombre"  value="{{$division->nombre =='' ?  old('nombre') :$division->nombre}}" >
                     <!--mostrar el error de validacion -->
                     @error('nombre')
                       <small style="color: red" >{{$message}}</small>
                        @enderror   
                </div>
                </div>
                

                <div  class="text-center ">
                    <button  id="saberBtn"  class="btn  animate__animated animate__bounce animate__delay-1s"  style=" background-color:#1466C3; color:#fff" >Aceptar</button>
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
                transform: translateY(20px);
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
