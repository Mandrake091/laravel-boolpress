<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>BoolPress</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="container h-100 w-100">
        <div class="h-100 w-100 row flex-column align-items-center justify-content-center text-white"> 
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <h1><a href="{{ url('/admin') }}">Home</a></h1>
                    @else
                        <h1>Ciao Ospite! @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registrati</a>
                            @endif o fai il <a href="{{ route('login') }}">Login</a></h1>
                    @endauth
                </div>
            @endif
            <div id="root"></div>
        </div>
    </div>
    <script src="{{ asset('js/front.js') }}" charset="utf-8"></script>
</body>

</html>
