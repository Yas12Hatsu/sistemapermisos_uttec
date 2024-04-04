@extends('adminlte::page')

@section('title', 'Aviso de Privacidad') 


@section('content')


<div class="login-logo">
    <a href="http://127.0.0.1:8000/home">
        <img src="https://sistema.permiso/vendor/adminlte/dist/img/teamphp.png"
                 alt="Admin Logo" height="50">
        
        
        <b style="color: rgb(40, 99, 155)">TEAM</b><a style="color: rgb(40, 99, 155)">PHP</a>

    </a>
</div>
<center>
    <h2><p>AVISO DE PRIVACIDAD</p></h2>
</center>
    <br><br>
    <a >TEAM PHP con domicilio en Universidad Tecnológica de Tecámac, Carretera Federal 
        México – Pachuca Km 37.5, CP 55740, Col. Sierra Hermosa, Tecámac, Estado de, 55740 
        San Martín Azcatepec, Méx., conforme a lo establecido en la Ley Federal de Protección 
        de Datos en Posesión de Particulares, pone a disposición de nuestros clientes, 
        proveedores, empleados y público en general, nuestro Aviso de Privacidad.
    </a>
    <br>
    <a >
        Los datos personales que nos proporciona son utilizados estrictamente en la 
        realización de funciones propias de nuestra empresa y por ningún motivo serán 
        transferidos a terceros

    </a>
    <ol >
        <li>
            <p>A nuestros clientes les solicitamos los siguientes datos personales:</p>
            <ul>
                <li>
                    Nombre.
                </li>
                <li>
                    Correo Electronico.
                </li>
            </ul>
        </li>
        <li>
            <p>A nuestros empleados solicitamos los siguientes datos personales:</p>
            <ul>
                <li>
                    Nombre.
                </li>
                <li>
                    Correo Electronico.
                </li>
            </ul>
        </li>
    </ol>

    <p >En caso de realizar modificaciones al presente Aviso de Privacidad, le informaremos 
        mediante correo electrónico, nuestro sitio web oficial, medios impresos y nuestros 
        operadores telefónicos
    </p>



@endsection

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
    </style>
@stop