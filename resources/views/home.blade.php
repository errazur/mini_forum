<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Home du Forum de No L's --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Feed</title>
</head>
<body class="bg-purple-400">
    <a href="/forum"><div class="shadow"><h2 class="text-center">Bienvenue sur le Forum</h2></div></a>

        @yield('content')

</body>
</html>
