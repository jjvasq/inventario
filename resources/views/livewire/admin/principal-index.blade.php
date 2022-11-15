<div>
    <div class="card-header">
        <div class="row">
            <div class="col-6 col-sm-5 col-md-4 input-group input-group-sm items-center">
                <span>Mostrar</span>
                <select wire:model="cant" class="mx-2 form-control">
                    <option value="6">6</option>
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
                        <th style="width: 60px" wire:click="order('ips.direccion_ip')">
                            IP
                            @if ($sort == 'ips.direccion_ip')
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
                            Nom Puesto
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
                        <th wire:click="order('sectores.nombre')">
                            Sector
                            @if ($sort == 'sectores.nombre')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th>Referencia Lugar</th>
                        <th>Planta</th>
                        
                        <th>B.Patch</th>
                        <th>B.Switch</th>
                        <th>Switch</th>
                        {{-- <th>Data</th>
                        <th>Descripción</th> --}}
                        <th class="text-bold text-info text-center">Info</th>
                        <th>Conect</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($puestos as $puesto)
                        <tr>
                            <td class="text-bold text-navy">
                                @if ($puesto->direccion_ip)
                                    {{ $puesto->direccion_ip }}    
                                @else
                                    <p class="text-center">S/D</p>
                                @endif
                                
                            </td>
                            <td>{{ $puesto->nombre }}</td>
                            <td>
                                @if ($puesto->nombre_sector != null)
                                    {{ $puesto->nombre_sector }}    
                                @else
                                    S/D
                                @endif
                                
                            </td>
                            <td>
                                @if ($puesto->referencia_lugar != null)
                                    {{ $puesto->referencia_lugar }}
                                @else
                                    S/Ref
                                @endif
                            </td>
                            <td>
                                @if ($puesto->nombre_sector != null)
                                    @if ($puesto->planta_sector == 1)                                        
                                        <span class="badge bg-success">P.Alta</span>
                                    @else
                                        <span class="badge bg-secondary">P.Baja</span>
                                    @endif
                                @else
                                    <span class="badge bg-danger">S/D</span>
                                @endif
                                
                            </td>
                            
                            <td style="text-align:center">{{ $puesto->boca_patch }}</td>
                            <td style="text-align:center">{{ $puesto->boca_switch }}</td>
                            <td style="text-align:center">
                                @if ($puesto->conectada_rack)
                                    {{$puesto->numero_conmutador}}
                                @else
                                    <span class="badge bg-danger">No Conectado</span>
                                @endif
                            </td>
                            {{-- <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" 
                                        data-toggle="dropdown">
                                        <i class="fas fa-globe"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        @if ($puesto->conectada_rack)
                                            <li>
                                                <p class="mx-3">Sw: {{ $puesto->numero_conmutador }}
                                                ({{ $puesto->marca_conmutador }})</p>    
                                            </li>
                                            <li>
                                                @if ($puesto->nombre_rack != null)
                                                    <p class="mx-3">Rack: {{ $puesto->nombre_rack }}</p>
                                                @else
                                                    <p class="text-danger mx-3">El Switch no está en Rack (Mirar Detalle)</p>
                                                @endif
                                            </li>
                                        @else
                                            <li>
                                                S/D
                                            </li>
                                        @endif
                                        
                                    </ul>
                                </div>
                            </td> --}}
                            {{-- <td>
                                <div class="btn-group ml-4">
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" 
                                        data-toggle="dropdown">
                                        <i class="fas fa-info"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            @if ($puesto->descripcion != null)
                                                <p class="mx-3">{{ $puesto->descripcion }}</p>    
                                            @else
                                                S/D
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </td> --}}
                            {{-- <td width="10px">
                                <a class="btn btn-success btn-sm ml-2"
                                    href="{{ route('admin.inventario.show', $puesto->id) }}"><i class="fas fa-eye"></i></a>
                            </td> --}}

                            <td>
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-info dropdown-toggle" 
                                            data-toggle="dropdown">
                                            <i class="fas fa-globe"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if ($puesto->conectada_rack)
                                                <li>
                                                    <p class="mx-3">Sw: {{ $puesto->numero_conmutador }}{{-- </p> --}}
                                                    {{-- <p class="mx-3"> --}}({{ $puesto->marca_conmutador }})</p>    
                                                </li>
                                                <li>
                                                    @if ($puesto->nombre_rack != null)
                                                        <p class="mx-3">Rack: {{ $puesto->nombre_rack }}</p>
                                                    @else
                                                        <p class="text-danger mx-3">El Switch no está en Rack (Mirar Detalle)</p>
                                                    @endif
                                                </li>
                                            @else
                                                <li>
                                                    S/D
                                                </li>
                                            @endif
                                            
                                        </ul>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" 
                                            data-toggle="dropdown">
                                            <i class="fas fa-info"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if ($puesto->descripcion != null)
                                                    <p class="mx-3">{{ $puesto->descripcion }}</p>    
                                                @else
                                                    S/D
                                                @endif
                                            </li>
                                        </ul>
                                    </div>

                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('admin.inventario.show', $puesto->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                @if ($puesto->conectada_rack == 1)
                                    <div class="btn btn-group btn-sm btn-default ml-2"> <i class="fas fa-check" style="color: green"></i></div>
                                @else
                                    <div class="btn btn-group btn-sm btn-default ml-2"> <i class="fas fa-bolt" style="color: red"></i></div>
                                    {{-- <small class="text-danger">No</small> --}}
                                @endif
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
