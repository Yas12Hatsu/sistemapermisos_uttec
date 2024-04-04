@extends('adminlte::page')
@section('title','Puestos')
    
@section('content')
<header>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</header>



<br>
<center>
        <div style=" background-color:#1466C3; color:#fff ; width: 90%;" id="tit"  class="bg text-white p-2 mb-2 rounded-top">
                <h3 class="text-center animate__animated animate__backInDown">Puestos</h3>
            </div>
        </div>
 </center>
        <div class="box-body">
            <table id="table-data" style="width: 90%;"  class="animate__animated animate__bounce table table-bordered custom-table">
            <thead style=" background-color:#1466C3; color:#fff">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th style="width:12%; height:22%;" colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody style=" background-color:rgb(255,255,255)" >
                @foreach($puestos as $puesto)
                <tr>
                    <td class="animate__animated animate__backInDown animate__delay-1s">{{$puesto['codigo']}}</td>
                    <td class="animate__animated animate__backInDown animate__delay-1s">{{$puesto['nombre']}}</td>
                    <td>
                          
                          <a href="{{route('nuevo.puesto',['id' => $puesto['id']])}}" class="btn btn-success btn-sm rounded-8 animate__animated animate__backInDown animate__delay-1s">
                                  <span class=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPdJREFUSEvVldERgkAMRLOdYCfSiVaiVqKdSClnJdFlgImR4wLCB/fDMBz7ktzOHmTjhY31ZTWAqt5F5AXgaov+AqjqUUS4sSp0VgNo+j2d+Kl7v1mIBzxFhJCp5cVZDP+zRQ0QD1Aq41NC5GxUtQKQ+HSQM4BHq2WFVDUM6MbCbtmRhbD6VnwxwM089ZCxrmd34MR7zQTg8DcgI07dYeYeEu4gKk6rWwuHAHPE6SbrwiIgKs7RjLkwAmit69bozNcCZA90DUBWfPGIIpFhQu8nCYpnsDtAJK5LTTUA6lzYMR0vgTshB2Hw0QjDZRTK/VLJU9/3D3gDazjBGbL5ohcAAAAASUVORK5CYII="/></span>
                              </a>

                      </td>
                      <td>
                                <a>
                                <form action="{{route('puesto.borrar',['id' => $puesto['id']])}}" class="formulario-eliminar" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger btn-sm rounded-8 animate__animated animate__backInDown animate__delay-1s">
                                        <span class=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJRJREFUSEvtlcENgCAMRfs301GcRJ1MRnGTag8kSoBaAh6UHhvyX/uBFtQ40FifVAAzD0S0JQpZASy5IrMARVx0dyKaALgU5AZgZq5hGc62vM67gBrVhxrROyi16mpN1CKf/BbAtx12FcsXWdQB6jPtFv3AIssAtHw02WCyySzhAIxPp6mIzwZIcrOpO9nSQuxsc8ABQHeaGbkbfj0AAAAASUVORK5CYII="/></span>
                                    </button>
                                
                                </form>
                                </a>
                            
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
        $('#table-data').DataTable({
            "scrollX": true
        });
    </script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>

$('.formulario-eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
        title: "¿Estás seguro de eliminar el registro?",
        text: "No se podrá recuperar después.",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Sí, deseo eliminar el registro!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "¡Eliminado!",
                text: "El registro fue eliminado correctamente.",
                icon: "success"
            });
            this.submit();
        }
        else{
            Swal.fire({
                title: "¡No eliminado!",
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
