<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
  @livewireStyles
</head>

<body>
  <h1 class="text-3xl underline">Categorias</h1>

  <form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <input class="input input-bordered" type="text" name="categoria" placeholder="Nombre de la Categoría" required>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>
  <br>


  @livewire('show-categorias')



  @isset($added)
  <p> Se ha agregado una nueva categoria </p>
  @endisset

  <br>
  <br>
  @livewireScripts
</body>


<br>
<br>

</html>
