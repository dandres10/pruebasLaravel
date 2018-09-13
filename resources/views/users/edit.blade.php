@extends('layout')
@section('contenido')
<h1>
    Editar usuario
</h1>
@if (session()->has('info'))
<div class="alert alert-success">
    {{ session('info')}}
</div>
@endif
<form action="{{route('usuarios.update',$user->id)}}" method="post">
    {!! method_field('PUT')!!}    
    @include('users.form')
    
                    <button class="btn btn-primary" name="enviar" type="submit">
                        Enviar
                    </button>
                    <br>
                        <br>
                        </br>
                    </br>
                </br>
            </br>
        </br>
    </br>
</form>
@endsection
