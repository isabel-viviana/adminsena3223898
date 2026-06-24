<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>course create</title>
</head>
<body>
    <h1>Formulario de curso</h1>
    
    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="nombre">
        </label>
        <br>
        <label>
            Gmail:
            <br>
            <input type="text" name="gmail">
        </label>
        <br>
        <br>

        <label for="area_id">area</label>

        <select name="area_id" id="area_id" class="form-control">
            <option value="">Seleccione un area</option>

            @foreach($areas as $area)
                <option value="{{ $area->id }}">
                    {{ $area->name }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <label for="trainingCenter_id">centro de formacion</label>

        <select name="trainingCenter_id" id="trainingCenter_id" class="form-control">
            <option value="">Seleccione un centro de formacion</option>

            @foreach($trainingCenters as $trainingCenter)
                <option value="{{ $trainingCenter->id }}">
                    {{ $trainingCenter->name }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <button type="submit">Enviar Formulario:</button>
    </form>
    
</body>
</html>