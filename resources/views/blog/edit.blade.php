@extends('layout')

@section('title', 'Modifer la publication')

@section('body')
<div class="container">
    
<h1 class="text-4xl text-center">Modification de l'article</h1>
<form class="w-75 mx-auto my-5" action="{{ route('post.update',$post) }}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
    <x-input name="title" label="Titre" value="{{ $post->title }}"/>
    <x-input name="image" label="Image" type="file" value="{{old('image')}}" />
    <x-input name="content" label="content" type="textarea">{{$post->content}}</x-input>
        <button class="btn btn-info">Modifer </button>
</form>
</div>
@endsection