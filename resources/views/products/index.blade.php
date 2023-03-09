<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>

<body>
    <h1 class="text-3xl underline"> Esto es products.index</h1>
    <h2>Formulario para agregar Producto</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <label for="my-modal" class="btn">Agregar Producto</label>

    @livewire('show-productos')

    <!-- MODAL CONTENT -->
    <input type="checkbox" id="my-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <div class="modal-action absolute top-0 right-0 m-3">
                <label for="my-modal" class="btn btn-circle btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>
            <h3 class="font-bold text-lg">Agregar Producto</h3>




            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <input class="input input-bordered" type="text" name="pName" placeholder="Nombre" required>
                <br>

                <select class="select select-bordered w-full max-w-xs" name="pCategoria" required>
                    <option value="" disabled selected>Categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>

                <button type="button" onclick="window.location='{{ route('categorias.index') }}'"
                    class="btn gap-2 btn-sm">
                    <x-heroicon-o-plus-circle class="w-6 h-6" />
                    Categoria
                </button>

                <br>

                <label class="input-group">
                    <span>Stock</span>
                    <input required name="pStock" type="number" placeholder="1" class="input input-bordered" />
                </label>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Precio</span>
                    </label>
                    <label class="input-group">
                        <input name="pPrice" type="text" placeholder="0.01" class="input input-bordered" />
                        <span>PEN</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>




        </div>
    </div>
    @livewireScripts
    <script>
        setTimeout(() => {
            $('.alert').fadeOut('fast');
        }, 4000);
    </script>
</body>

</html>
