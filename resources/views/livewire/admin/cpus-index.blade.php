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

    @if ($cpus->count()) {{-- Si hay alguno lo muestra --}}
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
                        <th wire:click="order('macaddress')">
                            Maccaddress
                            @if ($sort == 'macaddress')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th wire:click="order('procesador')">
                            Procesador
                            @if ($sort == 'procesador')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th>S. O.</th>
                        {{-- <th>Descrip.</th> --}}
                        <th>N°Patrimonial</th>
                        
                        <th>Nombre Puesto</th>
                        {{-- <th colspan="3" class="text-bold text-danger text-center">ACCIONES</th> --}}
                        <th class="text-bold text-primary text-center">ACCIONES</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cpus as $cpu)
                        <tr>
                            <td>{{ $cpu->id }}</td>
                            <td>{{ $cpu->macaddress }}</td>
                            <td>{{ $cpu->procesador }}</td>
                            <td>{{ $cpu->sistema_operativo }}</td>
                            {{-- <td>
                                <div class="btn-group ml-3">
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            @if ($cpu->descripcion != null)
                                                <p class="mx-3">{{ $cpu->descripcion }}</p>
                                            @else
                                                <p class="mx-3">S/D</p>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </td> --}}
                            <td>
                                @if ($cpu->patrimonial != null)
                                    {{ $cpu->patrimonial }}
                                @else
                                    <small class="text-secondary">S/D</small>
                                @endif

                            </td>
                           
                            <td>
                                @if ($cpu->nombre_puesto != null)
                                    {{ $cpu->nombre_puesto }}
                                @else
                                    <p class="text-bold text-slate-900">Sin Puesto Asignado</p>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-dark dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="fas fa-compact-disc"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <p class="mx-3">Disc.Tec: <span class="badge bg-secondary">{{ $cpu->disco_tec }}</span></p>
                                                <p class="mx-3">Disc.Cap: <span class="badge bg-info">{{ $cpu->disco_cap }}</span> GB</p>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="fas fa-memory"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <p class="mx-3">Mem-Mod: <span class="badge bg-secondary">{{ $cpu->ram_modelo }}</span></p>
                                                <p class="mx-3">Mem-Cant: {{ $cpu->ram_cant_gb }} GB</p>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if ($cpu->descripcion != null)
                                                    <p class="mx-3">{{ $cpu->descripcion }}</p>
                                                @else
                                                    <p class="mx-3">Sin Descripción</p>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- <button type="button" class=""> --}}
                                        <a class="btn btn-sm btn-success" href="{{ route('admin.cpus.show', $cpu) }}">
                                        <i class="fa fa-eye"></i></a>
                                    {{-- </button> --}}
                                    {{-- <button type="button" class=""> --}}
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.cpus.edit', $cpu) }}">
                                        <i class="fas fa-pen"></i></a>
                                    {{-- </button> --}}
                                    
                                        <form class="formulario-eliminar" action="{{ route('admin.cpus.destroy', $cpu) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($cpu->estado == 1)
                                    <small class="text-bold text-success">Activo</small>
                                @else
                                    @if ($cpu->estado == 0)
                                        <small class="text-bold text-danger">Baja</small>
                                    @else
                                        @if ($cpu->estado == 2)
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
        @if ($cpus->hasPages())
            <div class="card-footer">
                {{ $cpus->links() }}
            </div>
        @endif
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
