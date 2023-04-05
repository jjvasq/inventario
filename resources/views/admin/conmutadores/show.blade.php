@extends('adminlte::page')

@section('title', 'Switchs - ADMIN')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.conmutadores.index') }}">Volver al Índice</a>
    <h1>Switch: {{ $conmutador->numero }} {{$conmutador->marca}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="switch-desc-tab" data-toggle="tab" href="#switch-desc"
                        role="tab" aria-controls="switch-desc" aria-selected="true">Detalle-Switch</a>
                    <a class="nav-item nav-link" id="conexiones-desc-tab" data-toggle="tab" href="#conexiones-desc"
                    role="tab" aria-controls="conexiones-desc" aria-selected="false">Conexiones</a>
                    <a class="nav-item nav-link" id="imagenes-desc-tab" data-toggle="tab" href="#imagenes-desc"
                        role="tab" aria-controls="imagenes-desc" aria-selected="false">Imágenes</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade active show" id="switch-desc" role="tabpanel"
                    aria-labelledby="switch-desc-tab">
                    <h5><u> Descripción:</u></h5>
                    @if ($conmutador->descripcion != null)
                        <p>{{ $conmutador->descripcion }}</p>
                    @else
                        <p>Sin Detalle</p>
                    @endif
                    <h6><u>Referencia (Ubicación):</u></h6>
                    @if ($conmutador->referencia_lugar != null)
                        <p>{{ $conmutador->referencia_lugar }}</p>
                    @else
                        <p class="text-danger"><em>Sin Detalle</em></p>
                    @endif
                    <h6><u>Fecha última limpieza:</u></h6>
                    <p class="text-danger">{{ $conmutador->fecha_limpieza }}</p>
                </div>
                <div class="tab-pane fade" id="conexiones-desc" role="tabpanel" aria-labelledby="conexiones-desc-tab">
                    @if ($conexiones->count())
                        <div class="card-body table-striped table-responsive p-0" style="height: 400px; width:full">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 60px">Boca</th>
                                        <th>Patch</th>
                                        <th>Fecha Impactada</th>
                                        <th>Nombre Puesto</th>
                                        <th>En Uso</th>
                                        <th>IP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conexiones as $conexion)
                                        <tr>
                                            <td>{{$conexion->boca_switch}}</td>
                                            <td>{{$conexion->boca_patch}}</td>
                                            <td>{{$conexion->fecha_impactada}}</td>
                                            <td>{{$conexion->nombre_puesto}}</td>
                                            <td>
                                                @if ($conexion->en_uso)
                                                    <small class="text-center text-success">Activo</small>
                                                @else
                                                    <small class="text-center text-danger">No Activo</small>
                                                @endif
                                            </td>
                                            <td class="text-bold text-navy">
                                                @if ($conexion->en_uso)
                                                    {{$conexion->direccion_ip}}
                                                @else
                                                    <small class="text-center text-secondary">S/D</small>
                                                @endif
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
                        @if ($conmutador->imagenes->count())
                            @foreach ($conmutador->imagenes as $imagen)
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="callout callout-info mr-3">
                                        <div class="image-wrapper">
                                            <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($imagen->url)}}" alt="Imagen del Switch">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach    
                        @else
                            <p>No hay imágenes Asociadas al Switch.</p>
                        @endif
                    </div>
                </div>               
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