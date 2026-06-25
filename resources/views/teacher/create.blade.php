<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>teacher create</title>
</head>
<body>
    <h1>Formulario de profesor</h1>
    
    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <label>
            Email:
            <br>
            <input type="email" name="email">
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

        <label for="courses">Cursos (Selecciona uno o varios):</label>

        <select name="courses[]" id="courses" class="form-control" multiple>
            <option value="">Seleccione cursos</option>

            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->name_curso }} - {{ $course->day }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <button type="submit">Enviar Formulario:</button>
    </form>

</body>
</html>