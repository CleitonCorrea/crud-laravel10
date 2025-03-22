@extends('master')

@section('content')

<h2>Editar| <a href="{{ route('users.create') }}">Cadastrar</a>| <a href="{{ route('users.index') }}">Listar</a></h2>

@if(session()->has('messege'))
    {{ session()->get('messege') }}
@endif

<form method="post" action="{{ route('users.update',['user' => $user->id]) }}">
    @csrf

    <input type="text" name="name" value="{{ $user->name }}" />
    <input type="text" name="email" value="{{ $user->email }}" />

    <button type="submit">Salvar</button>

</form>

@endsection
