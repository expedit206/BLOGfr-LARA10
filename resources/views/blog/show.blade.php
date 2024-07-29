@extends('layout')

@section('title', "Visualisation du post    " )

@section('body')
<br><br>
<hr>
<h1 class="text-2xl p-2 font-bold uppercase">article {{ $post->title }}</h1>
<hr>
<ul class="flex-perso-1">

    <li>
        <div class="card">
    <div class="card-header">
        Auteur : {{ $post->user->firstname }} {{ $post->user->lastname }}</div>    
    <div class="card-body">
        <h4>{{ $post->title}}</h4>
        <p>{{ $post->content}}</p>
        <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}">
    </div>   
    
    @can('update', $post)
        
    <div class="card-footer">
        <a href="{{ route('post.edit',['post'=>$post])}}" class="btn btn-info">Modifier</a>
 
        
        <form action="{{ route('post.delete', ['post'=>$post]) }}" method="post">
            @csrf
            
            @method('delete')
            <button class="btn btn-danger">Supprimer</button>
        </form>
    </div>    
    @endcan
</div>
</div>    
</li>
<div class="flex justify-center items-center font-bold w-full ">

    <button class="btn btn-success w-1/6">Retour</button>
        
</ul>
  


</ul>

@endsection