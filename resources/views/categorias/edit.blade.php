<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>hola</h1>
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input type="text" class="form-control" id="categoria" name="categoria"
                value="{{ $categoria->categoria }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>

</body>

</html>
