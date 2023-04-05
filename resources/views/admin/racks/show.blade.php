@extends('adminlte::page')

@section('title', 'Inventario Racks')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.racks.index') }}">Volver al Índice</a>
    <h1>Puesto: {{ $rack->nombre }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="rack-desc-tab" data-toggle="tab" href="#rack-desc"
                        role="tab" aria-controls="rack-desc" aria-selected="true">Detalle-Rack</a>
                    <a class="nav-item nav-link" id="switch-desc-tab" data-toggle="tab" href="#switch-desc"
                        role="tab" aria-controls="switch-desc" aria-selected="false">Switchs</a>
                    <a class="nav-item nav-link" id="imagenes-desc-tab" data-toggle="tab" href="#imagenes-desc"
                        role="tab" aria-controls="imagenes-desc" aria-selected="false">Imágenes</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade active show" id="rack-desc" role="tabpanel"
                    aria-labelledby="rack-desc-tab">
                    <h5><u> Descripción:</u></h5>
                    @if ($rack->descripcion != null)
                        <p>{{ $rack->descripcion }}</p>
                    @else
                        <p>Sin Detalle</p>
                    @endif
                    <h6><u>Referencia (Ubicación):</u></h6>
                    @if ($rack->referencia_lugar != null)
                        <p>{{ $rack->referencia_lugar }}</p>
                    @else
                        <p class="text-danger"><em>Sin Detalle</em></p>
                    @endif
                    <h6><u>Planta:</u></h6>
                    @if ($rack->planta == 1)
                        <p class="text-success"><em>P. Alta</em></p>
                    @else
                        <p class="text-danger"><em>P. Baja</em></p>
                    @endif
                    <h6><u>Fecha última limpieza:</u></h6>
                    <p class="text-danger">{{ $rack->fecha_limpieza }}</p>
                </div>
                <div class="tab-pane fade" id="switch-desc" role="tabpanel" aria-labelledby="switch-desc-tab">
                    {{-- @livewire('admin.conmutadores-show', compact('conmutadores')) --}}
                    @if ($conmutadores->count())
                        <div class="card-body table-striped table-responsive p-0" style="height: 500px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 60px">
                                            ID
                                        </th>
                                        <th>Nro</th>
                                        <th>Marca</th>
                                        <th>Descripción</th>
                                        <th>Referencia</th>
                                        <th>Fecha Limpieza</th>
                                        <th class="text-bold text-danger text-center">Detalle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conmutadores as $conmutador)
                                        <tr>
                                            <td>{{$conmutador->id}}</td>
                                            <td>{{$conmutador->numero}}</td>
                                            <td>{{$conmutador->marca}}</td>
                                            <td>{{$conmutador->descripcion}}</td>
                                            <td>
                                                {{ $conmutador->referencia_lugar }}
                                                {{-- <div class="btn-group ml-3">
                                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <i class="fas fa-bars"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <p class="mx-3">{{ $conmutador->referencia_lugar }}</p>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                            </td>
                                            <td>{{$conmutador->fecha_limpieza}}</td>
                                            <td width="10px">
                                                <a class="btn btn-success btn-sm" href="{{route('admin.conmutadores.show', $conmutador)}}">
                                                    <i class="fas fa-eye"></i> Detalle
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                    @else
                        <div class="card-body">
                            <strong>No hay ningún registro</strong>
                        </div>
                    @endif

                </div>
                <div class="tab-pane fade" id="imagenes-desc" role="tabpanel" aria-labelledby="imagenes-desc-tab">
                    <div class="row">
                        @if ($rack->imagenes->count())
                            @foreach ($rack->imagenes as $imagen)
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="callout callout-info mr-3">
                                        <div class="image-wrapper">
                                            <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($imagen->url)}}" alt="Imagen del Rack">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach    
                        @else
                            <p>No hay imágenes Asociadas al Rack.</p>
                        @endif
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="conexion-desc" role="tabpanel" aria-labelledby="conexion-desc-tab">
                    <div class="card-group">
                        <div class="card card-success" style="max-width: full;">
                            <div class="card-header">
                                <h3 class="card-title">Conexión ID: {{ $conexion->id }}</h3>
                            </div>
                            <div class="card-body">
                                @if ($conexion->conectada_rack == 1)
                                    <h6><u>Conectada a Rack:</u> <i class="fas fa-check" style="color:green"></i></h6>
                                    <h6><u>Boca de Patch:</u> {{ $conexion->boca_patch }}</h6>
                                    <h6><u>Boca de Switch:</u> {{ $conexion->boca_switch }}</h6>
                                    <h6 class="text-danger"><u>Fecha Impactada:</u> {{ $conexion->fecha_impactada }}</h6>
                                @else
                                    <h6><u>Conectada a Rack:</u> NO<i class="fas fa-bolt" style="color:red"></i></h6>
                    
                                @endif

                                @if ($conexion->en_uso == 1)
                                    <h6><u>En Uso:</u> <i class="fas fa-check" style="color:green"></i></h6>
                                    <h6><u>IP:</u> {{ $conexion->ip->direccion_ip }}</h6>
                                @else
                                    <h6><u>En Uso:</u> NO <i class="fas fa-bolt" style="color:red"></i></h6>
                                @endif
                            </div>
                        </div>
                        
                        @if ($conexion->conectada_rack == 1)
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Switch ID: {{ $conexion->conmutador->id }}</h3>
                                </div>
                                <div class="card-body">
                                    <h6 class="text-dark"><u>Número:</u> {{ $conexion->conmutador->numero }}</h6>
                                    <h6 class="text-secondary"><u>Marca:</u> {{ $conexion->conmutador->marca }}</h6>
                                    <h6 class="text-secondary"><u>Descripción:</u>
                                        {{ $conexion->conmutador->descripcion }}</h6>
                                    <h6 class="text-secondary"><u>Lugar de Referencia:</u>
                                        {{ $conexion->conmutador->referencia_lugar }}</h6>
                                    <h6 class="text-danger"><u>Fecha Limpieza:</u>
                                        {{ $conexion->conmutador->fecha_limpieza }}</h6>
                                </div>
                            </div>
                            @if ($conexion->conmutador->rack_id != null)
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Rack ID: {{ $conexion->conmutador->rack->id }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-dark"><u>Nombre:</u> {{ $conexion->conmutador->rack->nombre }}
                                        </h6>
                                        <h6 class="text-secondary"><u>Descripción:</u>
                                            {{ $conexion->conmutador->rack->descripcion }}</h6>
                                        <h6 class="text-secondary"><u>Lugar de Referencia:</u>
                                            {{ $conexion->conmutador->rack->referencia_lugar }}</h6>
                                        <h6 class="text-danger"><u>Fecha Limpieza:</u>
                                            {{ $conexion->conmutador->rack->fecha_limpieza }}</h6>
                                        @if ($conexion->conmutador->rack->planta == 1)
                                            <h6><u>Planta - Alta</u></h6>
                                        @else
                                            <h6><u>Planta - Baja</u></h6>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">El Switch se encuentra en el sector:
                                            {{ $conexion->conmutador->sector->nombre }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-secondary"><u>Descripción:</u>
                                            {{ $conexion->conmutador->sector->descripcion }}</h6>
                                        <h6 class="text-secondary"><u>Lugar de Referencia:</u>
                                            {{ $conexion->conmutador->sector->referencia_lugar }}</h6>
                                        @if ($conexion->conmutador->sector->planta == 1)
                                            <h6><u>Planta - Alta</u></h6>
                                        @else
                                            <h6><u>Planta - Baja</u></h6>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop