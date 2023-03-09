<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="p-6">
        <form method="POST" action="{{ route('products.update', $producto->id) }}">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <label for="nombre" class="block font-medium">Nombre:</label>
                <input class="input input-bordered" type="text" name="nombre" value="{{ $producto->nombre }}" required>
            </div>

            <div class="mt-4">
                <label for="stock">Stock:</label>
                <input class="input input-bordered" type="number" name="stock" value="{{ $producto->stock }}" required>
            </div>

            <div class="mt-4">
                <label for="precio">Precio:</label>
                <input class="input input-bordered" type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required>
            </div>

            <div class="mt-4">
                <label for="categoria_id">Categoría:</label>
                <select class="select select-bordered w-full max-w-xs" name="categoria_id" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->categoria }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Guardar</button>
        </form>

    </div>
</body>

</html>
