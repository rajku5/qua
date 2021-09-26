<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a href="" class="navbar-brand">Ask Me</a>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{route("home")}}" class="nav-link">Home</a></li>

                @auth
                    <li class="nav-item"><a href="" class="nav-link">{{Auth::user()->name}}</a></li>
                    <li class="nav-item">

                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input type="submit" value="logout" class="btn-danger">
                        </form>
                    </a></li>
                @endauth

                @guest
                    <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{route("register")}}" class="nav-link">signup</a></li>
                    
                @endguest
                
            </ul>
        </div>
    </nav>

    @section('content')
        
    @show
    @livewireScripts
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>