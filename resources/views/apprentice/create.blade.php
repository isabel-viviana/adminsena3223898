<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aprendices create</title>
</head>
<body>
    <h1>Formulario de aprendices</h1>
    
    <form action="{{ route('apprentice.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name_apren">
        </label>
        <br>
        <label>
            Email:
            <br>
            <input type="email" name="email">
        </label>
        <br>
        <label>
            Celular:
            <br>
            <input type="text" name="cell">
        </label>
        <br>
        <br>

        <label for="course_id">curso</label>

        <select name="course_id" id="course_id" class="form-control">
            <option value="">Seleccione un curso</option>

            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->name_curso }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <label for="computer_id">computador</label>

        <select name="computer_id" id="computer_id" class="form-control">
            <option value="">Seleccione un computador</option>

            @foreach($computers as $computer)
                <option value="{{ $computer->id }}">
                    {{ $computer->numero }} - {{ $computer->marca }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <button type="submit">Enviar Formulario:</button>
    </form>
</body>
</html>