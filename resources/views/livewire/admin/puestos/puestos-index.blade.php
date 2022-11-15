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

    @if ($puestos->count()) {{-- Si hay alguno lo muestra --}}
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
                        <th wire:click="order('descripcion')">
                            Descripcion
                            @if ($sort == 'descripcion')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th>Estado</th>
                        <th>Referencia</th>
                        <th>IdS</th>
                        <th>IdC</th>
                        <th>IdE</th>
                        <th>En.Uso</th>
                        <th>IP</th>
                        {{-- <th colspan="3" class="text-bold text-danger text-center">ACCIONES</th> --}}
                        <th class="text-bold text-primary text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($puestos as $puesto)
                        <tr>
                            <td>{{ $puesto->id }}</td>
                            <td>{{ $puesto->nombre }}</td>
                            <td>
                                @if ($puesto->descripcion != null)
                                    {{ $puesto->descripcion}}
                                @else
                                    <small class="text-secondary">S/D</small>
                                @endif
                            </td>
                            <td>
                                @if ($puesto->estado == 1)
                                    <small class="text-primary">Activo</small>
                                @else
                                    <small class="text-danger">No Activo</small>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group ml-3">
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            @if ($puesto->referencia_lugar != null)
                                                <p class="mx-3">{{ $puesto->referencia_lugar }}</p>    
                                            @else
                                                <p class="mx-3">Sin Referencia</p>
                                            @endif
                                            
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                @if ($puesto->sector_id != null)
                                    {{ $puesto->sector_id }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            <td>
                                @if ($puesto->conexion_id != null)
                                    {{ $puesto->conexion_id }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            <td>
                                @if ($puesto->equipamiento_id != null)
                                    {{ $puesto->equipamiento_id }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            <td>
                                 @if ($puesto->en_uso == 1)
                                    <span class="badge bg-success">Si</span>
                                 @else
                                    <span class="badge bg-danger">No</span>
                                 @endif
                            </td>
                            <td width="128px" style="align-content: center">
                                 @if ($puesto->en_uso == 1)
                                    <form class="liberar-ip" action="{{ route('admin.puestos.desconectar', $puesto->conexion_id) }}" method="get">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-bolt mt-1"></i> Desconectar</button>
                                    </form>

                                     {{-- <a class="btn btn-danger btn-sm"
                                         href="{{ route('admin.puestos.desconectar', $puesto->conexion_id) }}">
                                         <i class="fas fa-bolt mt-1"></i> Desconectar
                                     </a> --}}
                                 @else
                                    <span class="badge bg-secondary">No conectado</span>
                                 @endif
                            </td>
                           
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('admin.puestos.show', $puesto) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.puestos.edit', $puesto) }}">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form class="formulario-eliminar"
                                        action="{{ route('admin.puestos.destroy', $puesto) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @if ($puestos->hasPages())
            <div class="card-footer">
                {{ $puestos->links() }}
            </div>
        @endif
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
