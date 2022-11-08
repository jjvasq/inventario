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
    @if ($racks->count()) {{-- Si hay alguno lo muestra --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead>
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
                            Descripción
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
                        <th>Referencia</th>
                        <th>Planta</th>
                        <th>Fecha Limpieza</th>
                        <th colspan="3" class="text-bold text-danger text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($racks as $rack)
                        <tr>
                            <td>{{$rack->id}}</td>
                            <td>{{$rack->nombre}}</td>
                            <td>{{$rack->descripcion}}</td>
                            <td>
                                <div class="btn-group ml-3">
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <p class="mx-3">{{ $rack->referencia_lugar }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                @if ($rack->planta == 1)
                                    <small class="text-success">Planta Alta</small>
                                @else
                                    <small class="text-info">Planta Baja</small>
                                @endif
                            </td>
                            <td>{{$rack->fecha_limpieza}}</td>
                            <td width="10px">
                                <a class="btn btn-success btn-sm" href="{{route('admin.racks.show', $rack)}}">
                                    {{-- <i class="fas fa-eye"></i> --}}Detalle
                                </a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.racks.edit', $rack)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form class="formulario-eliminar" action="{{route('admin.racks.destroy', $rack)}}" method="POST">
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
        @if ($racks->hasPages())
            <div class="card-footer">
                {{$racks->links()}}
            </div>
        @endif
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
