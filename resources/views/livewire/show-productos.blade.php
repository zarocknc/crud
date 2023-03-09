<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="form-control">
        <div class="input-group">
            <input type="search" wire:model="search" placeholder="Buscar" class="input input-bordered" />
            <button class="btn btn-square">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </div>



    <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left uppercase"
                >
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Stock</th>
                    <th class="px-4 py-3">Precio</th>
                    <th class="px-4 py-3">Categoría</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class=" divide-y">
                @foreach ($productos as $producto)
                <tr>
                    <td class="px-4 py-3">{{ $producto->id }}</td>
                    <td class="px-4 py-3">{{ $producto->nombre }}</td>
                    <td class="px-4 py-3">{{ $producto->stock }}</td>
                    <td class="px-4 py-3">{{ $producto->precio }}</td>
                    <td class="px-4 py-3">{{ $producto->categoria->categoria }}</td>
                    <td class="px-4 py-3">
                        <div class="flex justify-start items-center space-x-2">
                            <button wire:click="editar({{ $producto->id }})" class="btn btn-info">Editar</button>
                            <button wire:click="eliminar({{ $producto->id }})" class="btn btn-danger">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
