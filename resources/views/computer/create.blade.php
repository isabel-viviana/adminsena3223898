<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>computer create</title>
</head>
<body>
    <h1>formulario computer</h1>
    
    <form action="{{route('computer.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Numero de curso:
            <br>
            <input type="text" name="numero">
        </label>
        <br>
        <label>
            Dia:
            <br>
            <input type="text" name="marca">
        </label>
        <br>
        
        <br>

        <button type="submit">Enviar Formulario:</button>
    </form>

</body>
</html>