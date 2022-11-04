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
                        <th>RAM-Mod</th>
                        <th>RAM-Cant</th>
                        <th>S. O.</th>
                        <th>Descrip.</th>
                        <th>N°Patrimonial</th>
                        <th>Estado</th>
                        <th>EquipID</th>
                        <th colspan="2" class="text-bold text-danger text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cpus as $cpu)
                        <tr>
                            <td>{{ $cpu->id }}</td>
                            <td>{{ $cpu->macaddress }}</td>
                            <td>{{ $cpu->procesador }}</td>
                            <td>{{ $cpu->ram_modelo}}</td>
                            <td>{{ $cpu->ram_cant_gb}}</td>
                            <td>{{ $cpu->sistema_operativo}}</td>
                            <td>
                                <div class="btn-group ml-3">
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <p class="mx-3">{{ $cpu->descripcion }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                @if ($cpu->patrimonial != null)
                                    {{$cpu->patrimonial}}
                                @else
                                    <small class="text-secondary">S/D</small>
                                @endif

                            </td>
                            <td>
                                @if ($cpu->estado == 1)
                                    <small class="text-primary">Activo</small>
                                @else
                                    <small class="text-danger">Baja</small>
                                @endif

                            </td>
                            <td>{{ $cpu->equipamiento_id}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.cpus.edit', $cpu) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form class="formulario-eliminar"
                                    action="{{ route('admin.cpus.destroy', $cpu) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
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
