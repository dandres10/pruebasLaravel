@extends('layout')
@section('contenido')

<h1>editar mensaje</h1>
<form action="{{route('messages.update',$message->id)}}" method="post">
    {!! method_field('PUT')!!}    
    @include('messages.form',['btnText' => 'Actualizar','showFields' => ! $message->user_id])
    </form>

@endsection