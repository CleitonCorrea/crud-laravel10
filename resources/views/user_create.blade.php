@extends('master')

@section('content')

<h2>Cadastrar| <a href="{{ route('users.index') }}">Listas</a> </h2>

@if(session()->has('messege'))
    {{ session()->get('messege') }}
@endif

<form method="post" action="{{route('users.store' )}}">
    @csrf

    Nome: <input type="text" name="name"/>
    E-mail: <input type="text" name="email" />
    E-mail de Verificação: <input type="text" name="email_verified_at" />
    Password: <input type="password" name="password" />

    <button type="submit">Cadastrar</button>

</form>

@endsection
