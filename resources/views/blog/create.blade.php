@extends('layout')

@section('title', 'Creer une publication')

@section('body')
<div class="container">
    
<h1 class="text-4xl text-center">Creer une publication</h1>
<form class="w-75 mx-auto my-5" action="" method="post" enctype="multipart/form-data">
@csrf
    <x-input name="title" label="Titre" value="{{old('title')}}"/>
    <x-input name="image" label="Image" type="file" value="{{old('image')}}" />
    <x-input name="content" label="content" type="textarea">{{old('image')}}</x-input>
        <button class="btn btn-info">Ajouter </button>
</form>
</div>
@endsection