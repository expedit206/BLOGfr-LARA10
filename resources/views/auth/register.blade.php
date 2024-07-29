@extends('layout')

@section('title', 'Inscription')

@section('body')

<div class="container">
    <h1 class="text-center text-5xl">Inscription</h1>

    <form  class="w-75 mx-auto my-5" method="post" novalidate>
        @csrf
        <x-input name="lastname" label="Nom" />
        <x-input name="firstname" label="Prenom" />
        <x-input name="email" label="Email" type="email"/>
        <x-input name="password" label="Mot de passe" type="password"/>
        <button class="btn btn-info">Inscription</button>
    </form>
</div>
@endsection