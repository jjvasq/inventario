<div x-show="open_ip">
    <div class="form-group">
        <h5 class="">IP:</h5>
        <div class="card">
            <div class="card-header">
                <div class="input-group input-group-sm flex items-center" style="width: full;">
                    <input wire:model="search" name="direccion_ip" type="text" class="form-control" placeholder="Ingrese Ip...">
                    <div class="input-group-append mr-2">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            @if ($ips->count())
            
                <div class="card-body table-sm table-responsive p-0" style="height: 150px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 60px;">
                                    ID
                                </th>
                                <th>Dirección IP:</th>
                                <th>Puesto Asignado:</th>
                                <th>Estado Ip</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ips as $ip)
                                <tr>
                                    <td>{{ $ip->id }}</td>
                                    <td>{{ $ip->direccion_ip }}</td>
                                    <td>
                                        @if ($ip->nombre_puesto != null)
                                            {{ $ip->nombre_puesto }}
                                        @else
                                            S/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($ip->estado == 1)
                                            <span>Activo <i class="fas fa-bolt" style="color:darkorange"></i></span>
                                        @else
                                            @if ($ip->estado == 0)
                                                <span>Libre <i class="fas fa-check" style="color:green"></i></span>    
                                            @else
                                                <span>Reservado <i class="fas fa-eye" style="color:brown"></i></span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div>
            @else
                <div class="card-body">
                    <h5><i class="fas fa-check" style="color:green"></i> Ip Disponible!</h5>
                </div>
            @endif
            
        </div>
        @error('direccion_ip')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
