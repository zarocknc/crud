<div>
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
    <div class="overflow-x-auto w-full">
        <table class="table w-full">
            <!--thead -->
            <thead>
                <tr>
                    <th>
                    </th>
                    <th>Nombre</th>
                    <th>Fecha de creacion</th>
                    <th>Actualizacion</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($categorias as $categoria)
                <tr>
                    <th>{{ $categoria->id }}</th>
                    <td>{{ $categoria->categoria }}</td>
                    <td>{{ $categoria->created_at->formatLocalized('%M:%H %d/%b') }}</td>
                    <td>{{ $categoria->updated_at->formatLocalized('%M:%H %d/%b') }}</td>
                    <td><button type="button" wire:click='editar({{ $categoria->id }})'
                            class="btn btn-info">Editar</button></td>
                    <td><button wire:click='delete({{ $categoria->id }})' class="btn btn-error">Eliminar</button></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div></div>

</div>
