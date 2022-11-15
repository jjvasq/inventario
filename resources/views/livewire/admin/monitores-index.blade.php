<div>
    <div class="card-header">
        <div class="row">
            <div class="col-6 col-sm-5 col-md-4 input-group input-group-sm items-center">
                <span>Mostrar</span>
                <select wire:model="cant" class="mx-2 form-control">
                    {{-- <option value="3">3</option> --}}
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span>entradas</span>
            </div>
            <div class="col input-group input-group-sm flex items-center" style="width: full;">
                <input wire:model="search" type="text" class="form-control" placeholder="Buscar">
                <div class="input-group-append mr-2">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if ($monitores->count()) {{-- Si hay alguno lo muestra --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table table-bordered">
                    <tr>
                        <th style="width: 60px" wire:click="order('id')">
                            ID
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif

                        </th>
                        <th wire:click="order('marca')">
                            Marca
                            @if ($sort == 'marca')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th wire:click="order('tamanio')">
                            Tamaño
                            @if ($sort == 'tamanio')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th wire:click="order('modelo')">
                            Modelo
                            @if ($sort == 'modelo')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th wire:click="order('serial')">
                            Serial
                            @if ($sort == 'serial')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th>N°Patrimonial</th>
                        <th>Nombre_Puesto</th>
                        <th class="text-bold text-primary text-center">ACCIONES</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monitores as $monitor)
                        <tr>
                            <td>{{ $monitor->id }}</td>
                            <td>{{ $monitor->marca }}</td>
                            <td>{{ $monitor->tamanio }}</td>
                            <td>{{ $monitor->modelo}}</td>
                            <td>{{ $monitor->serial }}</td>
                            <td>
                                @if ($monitor->patrimonial != null)
                                    {{$monitor->patrimonial}}
                                @else
                                    <small class="text-secondary">S/D</small>
                                @endif
                            </td>
                            <td>
                                @if ($monitor->nombre_puesto != null)
                                    {{ $monitor->nombre_puesto }}
                                @else
                                    <p class="text-bold text-center text-slate-900">Sin Puesto Asignado</p>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group ml-2">
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('admin.monitores.show', $monitor) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.monitores.edit', $monitor) }}">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form class="formulario-eliminar"
                                        action="{{ route('admin.monitores.destroy', $monitor) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($monitor->estado == 1)
                                    <small class="text-bold text-success">Activo</small>
                                @else
                                    @if ($monitor->estado == 0)
                                        <small class="text-bold text-danger">Baja</small>
                                    @else
                                        @if ($monitor->estado == 2)
                                            <small class="text-bold text-danger">En Reparación</small>
                                        @else
                                            <small class="text-bold text-danger">Hurtado</small>
                                        @endif
                                    @endif
                                @endif

                            </td>
                            {{-- <td>{{ $monitor->equipamiento_id }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.monitores.edit', $monitor) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form class="formulario-eliminar"
                                    action="{{ route('admin.monitores.destroy', $monitor) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @if ($monitores->hasPages())
            <div class="card-footer">
                {{ $monitores->links() }}
            </div>
        @endif
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
