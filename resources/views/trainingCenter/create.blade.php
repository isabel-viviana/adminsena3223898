<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>training center create</title>
</head>
<body>
    <h1>formulario training center</h1>

    <form action="{{route('trainingCenter.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <label>
            Locacion:
            <br>
            <input type="text" name="location">
        </label>
        <br>
        <br>

        <button type="submit">Enviar Formulario:</button>
    </form>
    
</body>
</html>