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

    @if ($conmutadores->count()) {{-- Si hay alguno lo muestra --}}
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
                        <th wire:click="order('numero')">
                            Num
                            @if ($sort == 'numero')
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
                        {{-- <th>Descripcion</th> --}}
                        <th>Referencia</th>
                        <th>Rack</th>
                        <th>Sector</th>
                        <th>Fecha Limpieza</th>
                        <th class="text-bold text-primary text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conmutadores as $conmutador)
                        <tr>
                            <td>{{ $conmutador->id }}</td>
                            <td>{{ $conmutador->numero }}</td>
                            <td>{{ $conmutador->marca }}</td>
                            {{-- <td>
                                <div class="btn-group ml-3">
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <p class="mx-3">{{ $conmutador->descripcion }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </td> --}}
                            <td>{{ $conmutador->referencia_lugar }}</td>
                            <td>
                                @if ($conmutador->rack_id != null)
                                    {{ $conmutador->rack->nombre }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            <td>
                                @if ($conmutador->sector_id == null)
                                    <small class="text-secondary">S/A</small>
                                @else
                                    {{ $conmutador->sector->nombre }}
                                @endif

                            </td>
                            <td>{{ $conmutador->fecha_limpieza }}</td>

                            <td>
                                <div class="btn-group ml-3">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <p class="mx-3">{{ $conmutador->descripcion }}</p>
                                            </li>
                                        </ul>
                                    </div>

                                    <a class="btn btn-success btn-sm"
                                        href="{{route('admin.conmutadores.show', $conmutador)}}">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.conmutadores.edit', $conmutador) }}">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form class="formulario-eliminar"
                                        action="{{ route('admin.conmutadores.destroy', $conmutador) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                            {{-- <td width="10px">
                                <a class="btn btn-success btn-sm" href="{{route('admin.conmutadores.show', $conmutador)}}">
                                    Detalle
                                </a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.conmutadores.edit', $conmutador) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form class="formulario-eliminar"
                                    action="{{ route('admin.conmutadores.destroy', $conmutador) }}" method="POST">
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
        @if ($conmutadores->hasPages())
            <div class="card-footer">
                {{ $conmutadores->links() }}
            </div>
        @endif
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
