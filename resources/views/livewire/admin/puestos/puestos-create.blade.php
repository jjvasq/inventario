<div x-show="open_conexion">
    <div class="form-group">
        <h5 class="">Switch - Selección/Búsqueda:</h5>
        <div class="card">
            <div class="card-header">
                <div class="input-group input-group-sm flex items-center" style="width: full;">
                    <input wire:model="search" type="text" class="form-control" placeholder="Buscar Switch">
                    <div class="input-group-append mr-2">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body table-sm table-responsive p-0" style="height: 200px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 60px;">
                                ID
                            </th>
                            <th>Número</th>
                            <th>Marca</th>
                            <th>Descripción</th>
                            <th>Rack</th>
                            <th>Ubicación (Sector)</th>
                            <th>SELECCIONAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conmutadores as $conmutador)
                            <tr>
                                <td>{{ $conmutador->id }}</td>
                                <td>{{ $conmutador->numero }}</td>
                                <td>{{ $conmutador->marca }}</td>
                                <td>{{ $conmutador->descripcion }}</td>
                                <td>
                                    @if ($conmutador->nombre_rack != null)
                                        {{ $conmutador->nombre_rack }}    
                                    @else
                                        <span class="text-danger">No está Rackeado</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($conmutador->nombre_sector != null)
                                        {{ $conmutador->nombre_sector }}    
                                    @else
                                        <span class="text-danger">-</span>
                                    @endif
                                </td>
                                <td>
                                    <label class="mr-3">
                                        {!! Form::radio('conmutador_id', $conmutador->id) !!}
                                        Seleccionado
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
        @error('conmutador_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
