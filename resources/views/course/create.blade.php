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
    
    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Numero de Curso:
            <br>
            <input type="text" name="name_curso">
        </label>
        <br>
        <label>
            Dia:
            <br>
            <input type="text" name="day">
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

        <label for="training_centers_id">centro de formacion</label>

        <select name="training_centers_id" id="training_centers_id" class="form-control">
            <option value="">Seleccione un centro de formacion</option>

            @foreach($trainingCenters as $trainingCenter)
                <option value="{{ $trainingCenter->id }}">
                    {{ $trainingCenter->name }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <label for="teachers">Profesores (Selecciona uno o varios):</label>

        <select name="teachers[]" id="teachers" class="form-control" multiple>
            <option value="">Seleccione profesores</option>

            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">
                    {{ $teacher->nombre }} - {{ $teacher->gmail }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <button type="submit">Enviar Formulario:</button>
    </form>
    
</body>
</html>