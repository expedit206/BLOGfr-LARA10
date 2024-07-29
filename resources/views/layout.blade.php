<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/app.css'])
    <title>@yield("title")</title>
</head>
<body data-bs-theme="dark">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('blog.index') }}">Acceuil</a>

        @guest
        <div>
          <a href="{{ route('auth.register') }}" class="btn btn-info">Inscription</a>
          <a href="{{ route('auth.logout') }}" class="btn btn-info">Connexion</a>
        </div>
        @endguest

        @auth
      <div class="flex items-center gap-2">
        <a href=" {{route('post.create')}} " class="btn btn-warning">Creer</a>

        <form action="{{route('auth.logout')}}" method="post">
          @csrf
          @method('delete')
          <button class="btn btn-info">Deconnexion</button>
        </form> 
      </div>
        @endauth
        </div>
      </nav>

      @if (@session('ok'))
          <div class="alert alert-info"> {{session('ok')}} </div>
        
      @endif
    @yield('body')

    
</body>
</html>