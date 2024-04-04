@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
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
    <form action="{{ $login_url }}" method="post">
    <div style=" background-color:#1466C3; color:#fff"  class="bg text-white p-1 rounded mb-3">
                        <h4 class="text-center">Iniciar Sesión</h4>
                    </div>
                    

        @csrf

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="usuario@gmail.com" autofocus>

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
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            
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
                var togglePasswordButton = document.getElementById('togglePassword');
            
                togglePasswordButton.addEventListener('click', function() {
                    var fieldType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', fieldType);
                    togglePasswordButton.innerHTML = fieldType === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
                });
            });
        </script>

        {{-- Login field --}}
        <div class="row">
            <div class="col-7">
                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('Recordar cuenta') }}
                    </label>
                </div>
            </div>
            <div>
                <button style="border-radius: 10px;  background-color:#1466C3; " type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('Continuar') }}
                    {{-- {{ __('adminlte::adminlte.sign_in') }} --}}
                </button>
            </div>
        </div>

    </form>
@stop


@section('auth_footer')
    {{-- Password reset link --}}
    @if($password_reset_url)
        <p class="my-0">
        <button style="border-radius: 10px; color:#fff;  background-color:#1466C3; " type=submit class="btn btn-block mb-3 {{ config('adminlte.classes_auth_btn') }}">
        <a style="color: #fff;" href="{{ $password_reset_url }}">
                {{ __('Olvide mi contraseña') }}
                {{-- {{ __('adminlte::adminlte.i_forgot_my_password') }} --}}
        </a>
        </button> 
        </p>
    @endif

    {{-- Register link --}}
    @if($register_url)
        <p class="my-0">
        <center>
        <a style="color: #1466C3;" href="{{ $register_url }}">
                {{ __('Registrar nuevo usuario') }}
                {{-- {{ __('adminlte::adminlte.register_a_new_membership') }} --}}
            </a>
            </center>

        </p>

        <p class="my-0">
            <center>
        <a style="color: #1466C3;" href="aviso_privacidad">
                {{ __('Aviso de privacidad') }}
            </a>
            </center>

        
        </p>
    @endif
@stop

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


