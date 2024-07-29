@extends('layout')

@section('title', 'Mon blog')

@section('body')

<h1 class="text-2xl mb-4">Acceuil</h1>
<ul class="flex-perso">


    @forelse ($posts as $post)

        <li>
        <div class="card">
        <div class="card-header">
            Auteur : {{ $post->user->firstname }} {{ $post->user->lastname }}</div>    
        <div class="card-body">
            <h4>{{ $post->title}}</h4>
            <p>{{  mb_strimwidth($post->content, 0, 150, "...") }} </p>
        </div>    
        <div class="card-footer">
            <a href="{{ route('post.show',['post'=>$post])}}" class="btn btn-info">Voir plus</a>
        </div>    
        </div>    
        </li>
            
        @empty
        <div>

            <p class="alert alert-info w-full font-bold text-3xl text-white">Aucun article publié !!! </p>
        </div>
        @endforelse
    </ul>

</ul>
<br>
{{ $posts->links() }}
@endsection