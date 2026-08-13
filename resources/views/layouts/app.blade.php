<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>administrador sena</title>

    @include('includes.dependencias')

    <style>
        body {
            background-color: #ffffff;
            min-height: 100vh;
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    @include('includes.navbar')

    @yield('content')

    <!-- vista de traer los registros-->



    @include('includes.footer')

    @include('includes.dependenciasBody')


</body>

</html>
