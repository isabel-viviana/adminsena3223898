<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>area create</title>
</head>
<body>
    <h1>formulario area</h1>

    <form action="{{route('area.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <br>

        <button type="submit">Enviar Formulario:</button>
    </form>
    
</body>
</html>