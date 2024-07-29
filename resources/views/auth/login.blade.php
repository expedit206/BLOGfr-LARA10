@extends('layout')

@section('title', 'Connexion')

@section('body')

<div class="container">
    <h1 class="text-center text-5xl">Connexion</h1>

    <form class="w-75 mx-auto my-5" method="post" novalidate>
        @csrf
        
    <x-input name="email" label="Email" type="email"/>
        <x-input name="password" label="Mot de passe" type="password"/>
        <button class="btn btn-info">Connexion</button>
    </form>

</div>
@endsection