@extends('layout')

@section('title','login')
    
@section('content')
    <div class="container mt-5">
        <form action="{{ route('login.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Usuario: </label>
                <input type="text" class="form-control" id="username" name="username" required>
                <br>
                <br>
                <br>
            </div>
            <div class="form-group">
                <label for="password">Contraseña: </label>
                <input type="password" class="form-control" id="password" name="password" required>
                <br>
                <br>

                <button id="saberBtn" type="submit" class="btn btn-primary">Entrar</button>
            </form>


    </div>

    @endsection
