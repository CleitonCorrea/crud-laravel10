@extends('master')

@section('content')
<h3><a href="{{ route('users.create') }}">Cadastrar</a></h3>
<h2>Usuarios:</h2>

<ul>
    @foreach ($users as $user )
        <li>{{ $user->name }}
            <a href="{{ route('users.edit',['user'=>$user->id]) }} ">Editar</a>
            <a href="{{ route('users.destroy', ['user'=> $user->id]) }}">Deletar</a>
        </li>
    @endforeach
</ul>

@endsection
