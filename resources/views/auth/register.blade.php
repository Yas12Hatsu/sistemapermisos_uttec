 @extends('adminlte::auth.register')

<!DOCTYPE html>
<html lang="en">

<head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    
    <link rel="icon" type="image/png" href="{{ asset('http://127.0.0.1:8000/vendor/adminlte/dist/img/teamphp.png') }}" />

    <title>   TEAM PHP  </title>

    
    
    
            <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/adminlte/dist/css/adminlte.min.css">

                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
            
    
    
    
    
    
            
    
    
</head>

{{-- <body class="register-page" >
    <div class="register-box">
        {{-- <div class="register-logo">
            <a href="http://127.0.0.1:8000/home"> --}}
                {{-- <img src="http://127.0.0.1:8000/vendor/adminlte/dist/img/AdminLTELogo.png" alt="Admin Logo" height="50"> 
                <img src="http://127.0.0.1:8000/vendor/adminlte/dist/img/teamphp.png"  height="50">
                
                <b style="color: rgb(40, 99, 155)">TEAM</b> <a style="color: rgb(40, 99, 155)"> PHP</a> </a>

        </div> --}}

        
        {{-- <div class="card card-outline card-primary">
            <div class="card-header ">
                <h3 class="card-title float-none text-center">
                    Registrar nuevo usuario
                </h3>
            </div>
            <div class="card-body register-card-body ">
                <form action="http://127.0.0.1:8000/register"  method="post">
                        <input type="hidden" name="_token" value="d13U3LLOflWvYkQnKDbrIZ6wHG6kyijzytGej5YG" autocomplete="off">
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control " value="" placeholder="Nombre de Usuario" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user "></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control " value="" placeholder="Correo">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope "></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control " placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock "></span>
                                </div>
                            </div>
                        </div>

            
            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control " 
                placeholder="Repetir Contraseña">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock "></span>
                    </div>
                </div>
            </div>

            
            <button type="submit" style="border-radius: 10px;" class="btn btn-block btn-flat btn-primary">
                <span class="fas fa-user-plus"></span>
                Registrar
            </button>
        </form>
    </div>
    <div class="card-footer ">
        <p class="my-0">
            <a href="http://127.0.0.1:8000/login">
                Ya tengo una cuenta
            </a>
        </p>
    </div>
    </div>
    </div>

    
            <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
        <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://127.0.0.1:8000/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="http://127.0.0.1:8000/vendor/adminlte/dist/js/adminlte.min.js"></script>
    
     
    
    
    
     --}}
    
            
</body>

</html>

