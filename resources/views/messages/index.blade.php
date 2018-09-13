@extends('layout')
@section('contenido')
<h1>
    Listado de mensajes
</h1>
<table class="table">
    <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Nombre
            </th>
            <th>
                Email
            </th>
            <th>
                Mensaje
            </th>
            <th>
                Notas
            </th>
            <th>
                Etiquetas
            </th>
            <th>
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message )
        <tr>
            <td>{{ $message->id }}</td>
            @if ($message->user_id)
                <td><a href="{{ route('usuarios.show', $message->user_id) }}"></a>
                    {{ $message->user->name }}
                    
                </td>
                <td>
                    {{ $message->user->email }}
                </td>
            @else
                <td>
                    {{$message->nombre}}
                </td>
                <td>
                    {{ $message->email }}
                </td>
            @endif
            <td>
                <a href="{{route('messages.show', $message->id)}}">
                    {{ $message->mensaje }}
                </a>
            </td>
            <td>
            
                {{ $message->note ? $message->note()->pluck('body')->first() : '' }}
            </td>
            <td>
            
           
                {{ $message->tags->pluck('name')->implode(',') }}
            </td>
            <td>
                <a class="btn btn-primary btn-xs" href="{{route('messages.edit', $message->id)}}">
                    editar
                </a>
                <form action="{{route('messages.destroy',$message->id)}}" method="POST" style="display: inline">
                    {!! csrf_field()!!}
            {!!method_field('DELETE')!!}
                    <button class="btn btn-danger btn-xs" type="submit">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
