@extends('layout')
@section('contenido')
<h2>
    Crear nuevo usuario
</h2>
<form action="{{route('usuarios.store')}}" method="post">
    @include('users.form',['user' => new App\User])
    <button class="btn btn-primary" name="enviar" type="submit" >
    	Guardar
    </button>
</form>
@endsection
