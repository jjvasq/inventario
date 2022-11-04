<div class="card">

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
    @if ($ips->count()) {{-- Si hay alguno lo muestra --}}
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
                        <th style="width: 60px" wire:click="order('direccion_ip')">
                            IP
                            @if ($sort == 'direccion_ip')
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
                        <th>Puesto</th>
                        <th colspan="3" class="text-bold text-danger text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ips as $ip)
                        <tr>
                            <td>{{$ip->id}}</td>
                            <td>{{$ip->direccion_ip}}</td>
                            <td>
                                @if ($ip->estado == 1)
                                    <small class="text-success">Activo</small>
                                @else
                                    @if ($ip->estado == 0)
                                        <small class="text-info">LIBRE</small>
                                    @else
                                        <small class="text-info">RESERVADO</small>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if ($ip->nombre_puesto != null)
                                    {{ $ip->nombre_puesto }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                          
                            <td width="100px">
                                @if ($ip->estado == 1)
                                    <a class="btn btn-dark btn-sm" href="{{route('admin.ips.liberar', $ip)}}"><i class="fas fa-bolt mt-1"></i> Liberar</a>
                                @else
                                    <a class="btn btn-default btn-sm" href="#"><i class="fas fa-bolt mt-1"></i> Libre</a>
                                @endif
                               
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.ips.edit', $ip)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form class="formulario-eliminar" action="{{route('admin.ips.destroy', $ip)}}" method="POST">
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
        @if ($ips->hasPages())
            <div class="card-footer">
                {{$ips->links()}}
            </div>
        @endif
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
    
</div>

