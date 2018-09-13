@extends('layout')
@section('contenido')
<h2>
    Usuarios
</h2>
<a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">Crear nuevo usuario</a>

<table class="table">
    <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Email
            </th>
            <th>
                Role
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
        @foreach ($users as $user )
        <tr>
            <td>
                {{  $user->name}}
            </td>
            <td>
                {{  $user->email}}
            </td>
            <td>
               {{ $user->roles->pluck('display_name')->implode(' - ') }} 
               
            </td>
            <td>
                {{ $user->note() ? $user->note()->pluck('body')->first() : '' }}
            </td>
            <td>  {{ $user->tags->pluck('name')->implode(',') }} </td>
            <td>
                <a class="btn btn-primary btn-xs" href="{{route('usuarios.edit', $user->id)}}">
                    editar
                </a>
                <form action="{{route('usuarios.destroy',$user->id)}}" method="POST" style="display: inline">
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
