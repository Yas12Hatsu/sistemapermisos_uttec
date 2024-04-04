@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

    


@stop

@section('content')


<link rel="stylesheet" href="https://sistema.permiso/resources/css/inicio.css">

<div class="login-logo">
    <a href="https://sistema.permiso/home">
        <img src="https://sistema.permiso/vendor/adminlte/dist/img/teamphp.png"
                 alt="Admin Logo" height="50">
        
        
        <b style="color: rgb(40, 99, 155)">TEAM</b><a style="color: rgb(40, 99, 155)">PHP</a>

    </a>
</div>
<center>
<h1><p>Bienvenido </p></h1>
</center>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
  
    <link rel="stylesheet" href="https://sistema.permiso/resources/css/inicio.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop