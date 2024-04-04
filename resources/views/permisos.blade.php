@extends('adminlte::page')
@section('title','Permisos')
@section('content_header')

@stop
@section('content')
<header>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</header>
<BR>
<center>
<div style=" background-color:#1466C3; color:#fff ; width: 90%;" id="tit"  class="bg text-white p-2 mb-2">
                <h3 class="text-center animate__animated animate__backInDown">Permisos pendientes</h3>
            </div>
            </center>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>
    </div>
        <div class="box-body">
            <table  style="width: 90%;" id="table-data" class="animate__animated animate__bounce table table-bordered custom-table rounded">
                <thead style="  background-color:#1466C3; color:#fff">
                    <tr>
                        <th>Profesor</th>
                        <th>Fecha</th>
                       
                        <th>Motivo</th>
                        <th style="width:12%; height:22%;" colspan="2">Opciones</th>
                    </tr>

                </thead>
                <tbody style=" background-color:rgb(255,255,255)" >
                    @foreach ($permisos as $permiso)
                        <tr>
                            <td class="animate__animated animate__backInDown animate__delay-1s">{{$permiso->nombre_profesor}}</td>
                            <td class="animate__animated animate__backInDown animate__delay-1s">{{$permiso['fecha']}}</td>
                            <td class="animate__animated animate__backInDown animate__delay-1s">{{$permiso['motivo']}}</td>
                            <td>
    <form class="formulario-aceptar" id="form-autorizar-{{$permiso->id}}" action="{{ route('autorizar.permiso', ['id' => $permiso->id, 'estado' => 'A']) }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$permiso->id}}">
        <input type="hidden" name="observaciones" id="observaciones-autorizar-{{$permiso->id}}" value="">
        <button  class="btn btn-success btn-sm rounded-8 animate__animated animate__backInDown animate__delay-1s" >    <span class=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAL9JREFUSEvtlMENgzAQBHc7CZ0klSWpBDpJK3RyYZEtWZbB5xgekeDDAzTjXZ9NnPzwZD4uQbXhq6K1IjO7AbiTnPLOuisK8FECAG+Sr1TSJcjgM8nhsAQeuGQ/JfDCdwVmpi4nknMauwW+KQjwJwDBH1HSCt8TaOw+SwK9V0lIEaeluKGlY725B2G1qUQijaIbXt3kTKL/m+BVQXJKlQSlOa/ddq4xVZJ8mmrg+N0l8MKaNrkHethd5FnE/1f0BaCJSBkigymEAAAAAElFTkSuQmCC"/></span></button>
    </form>
</td>
<td>
    <form  class="formulario-rechazar" id="form-rechazar-{{$permiso->id}}" action="{{ route('rechazar.permiso', ['id' => $permiso->id, 'estado' => 'R']) }}"  method="post">
        @csrf
        <input type="hidden" name="id" value="{{$permiso->id}}">
        <input type="hidden" name="observaciones" id="observaciones-rechazar-{{$permiso->id}}" value="">
        <button  class="btn btn-danger btn-sm rounded-8 animate__animated animate__backInDown animate__delay-1s" onclick="updateObservaciones('observaciones-rechazar-{{$permiso->id}}')"><span class=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAM1JREFUSEvtlNENwyAQQ+1Nkk2STbpKJ2k2aUbpJte6Aikg4OAjqiqFz+Twu7MB4uTFk/VxAVyHf2uRmd1IbrU2zWwCsLRqqhNIHMADwIvknEOCuP4Lcq9BWgBtfAaBBHIQXz4T7CTX2pTNDIJQAhkRF9QNOYfIMvnudR4ncgEqzCD61LTlaNcIQIGqc61i8KUcXEDueQhdB6AL0hNy7PxrSyn41nX2jmkiHoVGID0XrRhoBllJ7sMZdD4VU0286x64z6VT4J6iC/D/Fr0BtmBjGZFBvxEAAAAASUVORK5CYII="/></span></button>
    </form>
</td>                             
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
<script>
    function updateObservaciones(inputId) {
        var observaciones = prompt("Ingrese observaciones:", "");
        if (observaciones !== null) {
            document.getElementById(inputId).value = observaciones;
        }
    }
</script>

    <script>
        $('#table-data').DataTable({
            "scrollx": true
        });
    </script>

    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formulario-aceptar').submit(function(e){
    e.preventDefault();

    Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Permiso Aceptado",
  showConfirmButton: false,
  timer: 1500
});
this.submit();
});
</script>

<script>
$('.formulario-rechazar').submit(function(e){
    e.preventDefault();

    Swal.fire({
        title: "¿Estás seguro de rechazar el registro?",
        text: "No se podrá recuperar después.",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Sí, deseo rechazar el permiso!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Rechazado!",
                text: "El permiso fue rechazado correctamente.",
                icon: "success"
            });
            this.submit();
        }
        else{
            Swal.fire({
                title: "¡No rechazado!",
                text: "Se canceló de forma correcta.",
                icon: "error"
            });
        }
    });
});

    
</script>

@stop

@section('css')
<style>

body{
    background-color: #c1e8ff;
}

    .btn:hover {
    transform: scale(1.1);
    }

    table {
  background: white;
  width: 50%;
  margin: 0 auto;
  margin-top: 2%;
  border-collapse: collapse;
  text-align: center;

}


.custom-table {
  border-collapse: collapse; /* Para fusionar los bordes de las celdas */
  border: 1px solid #ddd; /* Establece el borde de la tabla */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */
  border-radius: .4em;
  overflow: hidden;

}
#tit{
  border-collapse: collapse; /* Para fusionar los bordes de las celdas */
  border: 1px solid #ddd; /* Establece el borde de la tabla */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */

}
.custom-table th,
.custom-table td {
  border: none; /* Elimina el borde de las celdas */
  padding: 8px; /* Añade relleno a las celdas */
  padding: 10px;
}

.custom-table tr {
  border-bottom: 1px solid #ddd; /* Establece el borde solo en la parte inferior de cada fila */
}

th, td:before {
    background-color:#1466C3;
  }
tr:hover {
  background-color:#c9d8e9; 
}
</style>
@stop