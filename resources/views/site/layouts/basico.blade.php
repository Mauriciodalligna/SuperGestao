<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    <title>Super Gestão - @yield('titulo')</title>
</head>
<body>
    @include('site.layouts._partials.topo')
    @yield('conteudo')
</body>
</html>