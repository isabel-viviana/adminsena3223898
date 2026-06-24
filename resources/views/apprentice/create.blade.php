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

        <label for="course_id">area</label>

        <select name="course_id" id="course_id" class="form-control">
            <option value="">Seleccione un curso</option>

            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}">
                    {{ $curso->name }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <label for="computer_id">centro de formacion</label>

        <select name="computer_id" id="computer_id" class="form-control">
            <option value="">Seleccione un computador</option>

            @foreach($computers as $computer)
                <option value="{{ $computer->id }}">
                    {{ $computer->name }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        <button type="submit">Enviar Formulario:</button>
    </form>
</body>
</html>