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

    @if ($impresoras->count()) {{-- Si hay alguno lo muestra --}}
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
                        <th wire:click="order('nombre')">
                            Nombre
                            @if ($sort == 'nombre')
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
                        <th>Nombre.Puesto</th>
                        <th>N°Patrimonial</th>
                        <th class="text-bold text-primary text-center">ACCIONES</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($impresoras as $impresora)
                        <tr>
                            <td>{{ $impresora->id }}</td>
                            <td class="text-bold">{{ $impresora->nombre }}</td>
                            <td class="text-center">
                                @if ($impresora->modelo != null)
                                    {{ $impresora->modelo }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($impresora->serial != null)
                                    {{ $impresora->serial }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            <td>
                                @if ($impresora->nombre_puesto != null)
                                    {{ $impresora->nombre_puesto }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            
                            <td class="text-center">
                                @if ($impresora->patrimonial != null)
                                    {{$impresora->patrimonial}}
                                @else
                                    <small class="text-secondary">S/D</small>
                                @endif

                            </td>
                            {{-- <td>
                                @if ($impresora->estado == 1)
                                    <small class="text-primary">Activo</small>
                                @else
                                    <small class="text-danger">Baja</small>
                                @endif
                            </td>
                            <td>
                                @if ($impresora->equipamiento_id != null)
                                    {{ $impresora->equipamiento_id }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td> --}}
                            {{-- <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.impresoras.edit', $impresora) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form class="formulario-eliminar"
                                    action="{{ route('admin.impresoras.destroy', $impresora) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td> --}}
                            <td>
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if ($impresora->descripcion!=null)
                                                    <p class="mx-3">{{ $impresora->descripcion }}</p>    
                                                @else
                                                    <p class="mx-3">Sin Descripción</p>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>

                                    <a class="btn btn-sm btn-success" href="{{ route('admin.impresoras.show', $impresora) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.impresoras.edit', $impresora) }}">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form class="formulario-eliminar"
                                        action="{{ route('admin.impresoras.destroy', $impresora) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($impresora->estado == 1)
                                    <small class="text-bold text-success">Activo</small>
                                @else
                                    @if ($impresora->estado == 0)
                                        <small class="text-bold text-danger">Baja</small>
                                    @else
                                        @if ($impresora->estado == 2)
                                            <small class="text-bold text-danger">En Reparación</small>
                                        @else
                                            <small class="text-bold text-danger">Hurtado</small>
                                        @endif
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @if ($impresoras->hasPages())
            <div class="card-footer">
                {{ $impresoras->links() }}
            </div>
        @endif
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
