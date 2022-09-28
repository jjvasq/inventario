<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control float-right" placeholder="¡Búsqueda! => Ingrese Ip">    
    </div>
    @if ($ips->count()) {{-- Si hay alguno lo muestra --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IP</th>
                        <th>Estado</th>
                        <th colspan="2" class="text-bold text-danger text-center">ACCIONES</th>
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
                                    <small class="text-info">LIBRE</small>
                                @endif
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.ips.edit', $ip)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.ips.destroy', $ip)}}" method="POST">
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
        <div class="card-footer">
            {{$ips->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
    
</div>

