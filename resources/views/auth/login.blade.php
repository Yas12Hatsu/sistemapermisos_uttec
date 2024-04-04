@extends('adminlte::auth.login')

<!DOCTYPE html>
<html lang="en">

<head>

{{--     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="d13U3LLOflWvYkQnKDbrIZ6wHG6kyijzytGej5YG"> --}}

    
    
    
    <title>TEAM PHP </title>
    <link rel="icon" type="image/png" href="{{ asset('https://sistema.permiso/vendor/adminlte/dist/img/teamphp.png') }}" />


    <link rel="stylesheet" href="https://sistema.permiso/vendor/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://sistema.permiso/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://sistema.permiso/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://sistema.permiso/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>


{{-- <body class="login-page" >

    
        <div class="login-box">

        
        <div class="login-logo">
            <a href="https://sistema.permiso/home">
                <img src="https://sistema.permiso/vendor/adminlte/dist/img/teamphp.png"
                         alt="Admin Logo" height="50">
                
                
                <b style="color: rgb(40, 99, 155)">TEAM</b><a style="color: rgb(40, 99, 155)">PHP</a>

            </a>
        </div>

        
        <div class="card card-outline card-primary">

            
                            <div class="card-header ">
                    <h3 class="card-title float-none text-center">
                        Para continuar Inicia Sesión                   </h3>
                </div>
            
            
            <div class="card-body login-card-body ">
                    <form action="https://sistema.permiso/login" method="post">
        <input type="hidden" name="_token" value="d13U3LLOflWvYkQnKDbrIZ6wHG6kyijzytGej5YG" autocomplete="off">
        
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control "
                   value="" placeholder="Correo" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope "></span>
                </div>
            </div>

                    </div>

        
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control "
                   placeholder="Contraseña">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock "></span>
                </div>
            </div>

                    </div>

        
        <div class="row">
            <div class="col-7">
                <div class="icheck-primary" title="Keep me authenticated indefinitely or until I manually logout">
                    <input type="checkbox" name="remember" id="remember" >

                    <label for="remember">
                        Recordar mi cuenta
                    </label>
                </div>
            </div>

            <div class="col-5">
                <button type=submit class="btn btn-block btn-flat btn-primary">
                    <span class="fas fa-sign-in-alt"></span>
                    Entrar
                </button>
            </div>
        </div>

    </form>
            </div>

            
                            <div class="card-footer ">
                        
            <p class="my-0">
            <a href="https://sistema.permiso/password/reset">
                Olvide mi contraseña
            </a>
        </p>
    
    
            <p class="my-0">
            <a href="https://sistema.permiso/register">
               Registrar nueva cuenta
            </a>
        </p>
                    </div>
            
        </div>

    </div>

    
            <script src="https://sistema.permiso/vendor/jquery/jquery.min.js"></script>
        <script src="https://sistema.permiso/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://sistema.permiso/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="https://sistema.permiso/vendor/adminlte/dist/js/adminlte.min.js"></script>
    
    
    
    
    
    
            
</body> --}}

</html>

