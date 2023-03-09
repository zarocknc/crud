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
    <h1 class="text-3xl underline">Categorias | <a href="/">Productos</a></h1>
    @if (session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif
    @isset($added)
        <div id="success-message">
            <br>
            <div class="alert alert-success shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Se ha agregado una nueva categoria</span>
                </div>
            </div>
            <br>
        </div>
    @endisset
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <input class="input input-bordered" type="text" name="categoria" placeholder="Nombre de la Categoría"
            required>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
    <br>
    @livewire('show-categorias')


    @livewireScripts
    <script>
        setTimeout(function() {
            $('#success-message').fadeOut('fast');
        }, 4000); // tiempo en milisegundos
    </script>
</body>

</html>
