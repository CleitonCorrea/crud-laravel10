@extends('master')

@section('content')

<h2>Usuario: {{ $user->name  }}</h2>

@if(session()->has('messege'))
    {{ session()->get('messege') }}
@endif

<form action="{{ route('users.destroy',['user' => $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="delete" />
    <button type="submit">Deletar</button>

</form>

@endsection
