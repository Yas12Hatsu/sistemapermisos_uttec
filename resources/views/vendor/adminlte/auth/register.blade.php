@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_body')
<style>
.btn:hover {
    transform: scale(1.1);
}
a:hover {
    text-decoration: underline;
    
}
</style>


    <form action="{{ $register_url }}"  method="post">

    <div style=" background-color:#1466C3; color:#fff"  class="bg text-white p-2 mb-2 rounded  mb-4">
                        <h4 class="text-center">Registrar un nuevo usuario</h4>
                    </div>
                    
        @csrf

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="Nombre" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="Correo">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
    <div class="input-group mb-3">
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
               placeholder="Contraseña">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Confirm password field --}}
    <div class="input-group mb-3">
        <input type="password" name="password_confirmation"
               class="form-control @error('password_confirmation') is-invalid @enderror"
               placeholder="Repetir contraseña">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>

        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Mensaje de recomendación para una contraseña segura --}}
    <small id="passwordHelpBlock" class="form-text text-muted">
        <ul id="passwordRequirements">
            <li><span id="uppercase">Una letra mayúscula: </span></li>
            <li><span id="lowercase">Una letra minúscula: </span></li>
            <li><span id="number">Un número: </span></li>
            <li><span id="specialChar">Un carácter especial: </span></li>
            <li><span id="length">Al menos 8 caracteres: </span></li>
        </ul>
    </small>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var passwordInput = document.getElementById('password');
        var passwordRequirements = {
            uppercase: document.getElementById('uppercase'),
            lowercase: document.getElementById('lowercase'),
            number: document.getElementById('number'),
            specialChar: document.getElementById('specialChar'),
            length: document.getElementById('length')
        };

        passwordInput.addEventListener('input', function() {
            var passwordValue = passwordInput.value;
            checkRequirement(passwordValue.match(/[A-Z]/), passwordRequirements.uppercase);
            checkRequirement(passwordValue.match(/[a-z]/), passwordRequirements.lowercase);
            checkRequirement(passwordValue.match(/[0-9]/), passwordRequirements.number);
            checkRequirement(passwordValue.match(/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/), passwordRequirements.specialChar);
            checkRequirement(passwordValue.length >= 8, passwordRequirements.length);
        });

        function checkRequirement(condition, element) {
            var icon = condition ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>';
            element.innerHTML = icon + ' ' + element.textContent;
        }
    });
</script>


        {{-- Register button --}}
        <button type="submit" style="border-radius: 10px; background-color:#1466C3; " class=" btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('Registrar') }}
        </button>
   

    </form>
@stop





    @section('auth_footer')
    <p class="my-0">
    <center>
    <a style="color: #1466C3;" href="{{ $login_url }}">
            {{ __('Tengo una cuenta') }}
    </a>
    </center>
    </p>

    <p class="my-0">
    <center>
    <a style="color: #1466C3; "  href="aviso_privacidad">
            {{ __('Aviso de privacidad') }}
    </a>
    </center>
    </p>
@stop