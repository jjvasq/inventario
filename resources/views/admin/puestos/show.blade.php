@extends('adminlte::page')

@section('title', 'Puestos - ADMIN')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.puestos.index') }}">Volver al Índice</a>
    <h1>Puesto: {{ $puesto->nombre }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="puesto-desc-tab" data-toggle="tab" href="#puesto-desc"
                            role="tab" aria-controls="puesto-desc" aria-selected="true">Detalle-Puesto</a>
                        <a class="nav-item nav-link" id="sector-desc-tab" data-toggle="tab" href="#sector-desc"
                            role="tab" aria-controls="sector-desc" aria-selected="false">Sector</a>
                        <a class="nav-item nav-link" id="conexion-desc-tab" data-toggle="tab" href="#conexion-desc"
                            role="tab" aria-controls="conexion-desc" aria-selected="false">Conexión</a>
                        <a class="nav-item nav-link" id="equipamiento-desc-tab" data-toggle="tab" href="#equipamiento-desc"
                            role="tab" aria-controls="equipamiento-desc" aria-selected="false">Equipamiento</a>
                        <a class="nav-item nav-link" id="imagenes-desc-tab" data-toggle="tab" href="#imagenes-desc"
                            role="tab" aria-controls="imagenes-desc" aria-selected="false">Imágenes</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="puesto-desc" role="tabpanel"
                        aria-labelledby="puesto-desc-tab">
                        <h5><u> Descripción:</u></h5>
                        @if ($puesto->descripcion != null)
                            <p>{{ $puesto->descripcion }}</p>
                        @else
                            <p>Sin Detalle</p>
                        @endif
                        <h6><u>Estado:</u></h6>
                        @if ($puesto->estado == 1)
                            <p class="text-success">Activo</p>
                        @else
                            <p class="text-dark">No Activo</p>
                        @endif
                        <h6><u>Referencia (Ubicación):</u></h6>
                        @if ($puesto->referencia_lugar != null)
                            <p>{{ $puesto->referencia_lugar }}</p>
                        @else
                            <p class="text-danger"><em>Sin Detalle</em></p>
                        @endif
                        <h6><u>Fecha última limpieza:</u></h6>
                        <p class="text-danger">{{ $puesto->fecha_limpieza }}</p>
                    </div>
                    <div class="tab-pane fade" id="sector-desc" role="tabpanel" aria-labelledby="sector-desc-tab">
                        @if ($puesto->sector_id != null)
                            <div class="card card-info" style="max-width: full;">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $puesto->sector->nombre }}</h3>
                                </div>
                                <div class="card-body">
                                    <h6><u>Descripción:</u></h6>
                                    @if ($puesto->sector->descripcion != null)
                                        <p>{{ $puesto->sector->descripcion }}</p>
                                    @else
                                        <p>Sin Detalle</p>
                                    @endif
                                    <h6><u>Referencia (Ubicación):</u></h6>
                                    @if ($puesto->sector->referencia_lugar != null)
                                        <p>{{ $puesto->sector->referencia_lugar }}</p>
                                    @else
                                        <p class="text-danger"><em>Sin Detalle</em></p>
                                    @endif
                                    <h6><u>Planta:</u></h6>
                                    @if ($puesto->sector->planta == 1)
                                        <p class="text-success"><em>P. Alta</em></p>
                                    @else
                                        <p class="text-danger"><em>P. Baja</em></p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <p class="text-danger"><em>No asignado</em></p>
                        @endif

                    </div>
                    <div class="tab-pane fade" id="conexion-desc" role="tabpanel" aria-labelledby="conexion-desc-tab">
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
                                        <h6 class="text-dark"><u>Número Switch:</u> {{ $conexion->conmutador->numero }}</h6>
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
                                            <h3 class="card-title">Switch NO Rackeado</h3>
                                        </div>
                                        <div class="card-body">
                                            <h6>El Switch se encuentra en el sector:
                                                {{ $conexion->conmutador->sector->nombre }}</h6>
                                            <h6 class="text-secondary"><u>Descripción - Sector:</u>
                                                {{ $conexion->conmutador->sector->descripcion }}</h6>
                                            <h6 class="text-secondary"><u>Lugar de Referencia Sector:</u>
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
                    </div>
                    <div class="tab-pane fade" id="equipamiento-desc" role="tabpanel"
                        aria-labelledby="equipamiento-desc-tab">
                        @if ($puesto->equipamiento->estado == 1)

                            <div class="callout callout-info">
                                <h5>Descripción:</h5>
                                <p>{{$puesto->equipamiento->descripcion}}</p>
                                <p>Fecha Actualización: {{$puesto->equipamiento->fecha_actualizacion}}</p>
                            </div>
                            <div class="callout callout-success">
                                <div class="card-group">
                                    @if ($puesto->equipamiento->cpu != null)
                                        <div class="card card-success" style="max-width: full;">
                                            <div class="card-header">
                                                <h3 class="card-title">CPU ID: {{ $puesto->equipamiento->cpu->id }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <h6><u>Macaddress:</u> {{ $puesto->equipamiento->cpu->macaddress }}</h6>
                                                <h6><u>Procesador:</u> {{ $puesto->equipamiento->cpu->procesador }}</h6>
                                                <h6><u>RAM:</u> {{ $puesto->equipamiento->cpu->ram_modelo }}</h6>
                                                <h6><u>RAM cantidad:</u> {{ $puesto->equipamiento->cpu->ram_cant_gb }}</h6>
                                                <h6><u>Sistema Operativo:</u>
                                                    {{ $puesto->equipamiento->cpu->sistema_operativo }}</h6>
                                                <h6><u>Descripción:</u> {{ $puesto->equipamiento->cpu->descripción }}</h6>
                                                @switch($puesto->equipamiento->cpu->estado)
                                                    @case(1)
                                                        <h6><u>Activo:</u> <i class="fas fa-check" style="color:green"></i></h6>    
                                                        @break
                                                    @case(2)
                                                        <h6><u>En Reparación:</u> <i class="fas fa-bomb" style="color:brown"></i></h6>
                                                        @break
                                                    @case(3)
                                                        <h6><u>Hurtado:</u> <i class="fas fa-ghost" style="color:rgb(8, 7, 90)"></i></h6>
                                                    @break
                                                    @default
                                                        <h6><u>Dado de Baja</u> <i class="fas fa-trash" style="color:red"></i></h6>
                                                @endswitch
                                                {{-- @if ($puesto->equipamiento->cpu->estado == 1)
                                                    <h6><u>Activo:</u> <i class="fas fa-check" style="color:green"></i></h6>
                                                @else
                                                    @if ($puesto->equipamiento->cpu->estado == 0)
                                                        <h6><u>Dado de Baja</u> <i class="fas fa-trash" style="color:red"></i>
                                                        </h6>
                                                    @elseif ($puesto->equipamiento->cpu->estado == 2)
                                                        <h6><u>En Reparación:</u> <i class="fas fa-bomb"
                                                                style="color:brown"></i></h6>
                                                    @endif
                                                @endif --}}
                                            </div>
                                        </div>
                                    @else
                                        <div class="card card-success" style="max-width: full;">
                                            <div class="card-header">
                                                <h3 class="card-title">CPU</h3>
                                            </div>
                                            <div class="card-body">
                                                <h6>Sin CPU Asignado</h6>
                                            </div>
                                        </div>
                                    @endif
    
                                    {{-- Monitores --}}
                                    @if ($monitores->count())
                                        @foreach ($monitores as $monitor)
                                            <div class="card card-info" style="max-width: full;">
                                                <div class="card-header">
                                                    <h3 class="card-title">Monitor ID: {{ $monitor->id }}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h6><u>Marca:</u> {{ $monitor->marca }}</h6>
                                                    <h6><u>Tamaño:</u> {{ $monitor->tamanio }}</h6>
                                                    <h6><u>Modelo:</u> {{ $monitor->modelo }}</h6>
                                                    <h6><u>Serial:</u> {{ $monitor->serial }}</h6>
                                                    @switch($monitor->estado)
                                                        @case(1)
                                                            <h6><u>Activo:</u> <i class="fas fa-check" style="color:green"></i></h6>    
                                                            @break
                                                        @case(2)
                                                            <h6><u>En Reparación:</u> <i class="fas fa-bomb" style="color:brown"></i></h6>
                                                            @break
                                                        @case(3)
                                                            <h6><u>Hurtado:</u> <i class="fas fa-ghost" style="color:rgb(8, 7, 90)"></i></h6>
                                                        @break
                                                        @default
                                                            <h6><u>Dado de Baja</u> <i class="fas fa-trash" style="color:red"></i></h6>
                                                    @endswitch
                                                   {{--  @if ($monitor->estado == 1)
                                                        <h6><u>Activo:</u> <i class="fas fa-check" style="color:green"></i>
                                                        </h6>
                                                    @else
                                                        @if ($monitor->estado == 0)
                                                            <h6><u>Dado de Baja</u> <i class="fas fa-trash"
                                                                    style="color:red"></i></h6>
                                                        @elseif ($monitor->estado == 2)
                                                            <h6><u>En Reparación:</u> <i class="fas fa-bomb"
                                                                    style="color:brown"></i></h6>
                                                        @endif
                                                    @endif --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="card card-info" style="max-width: full;">
                                            <div class="card-header">
                                                <h3 class="card-title">Monitor</h3>
                                            </div>
                                            <div class="card-body">
                                                <h6>Sin Monitor Asignado</h6>
                                            </div>
                                        </div>
                                    @endif
    
                                    {{-- Impresoras --}}
                                    @if ($impresoras->count())
                                        @foreach ($impresoras as $impresora)
                                            <div class="card card-dark" style="max-width: full;">
                                                <div class="card-header">
                                                    <h3 class="card-title">Impresora ID: {{ $impresora->id }}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h6><u>Nombre:</u> {{ $impresora->nombre }}</h6>
                                                    <h6><u>Descripción:</u> {{ $impresora->descripcion }}</h6>
                                                    <h6><u>Modelo:</u> {{ $impresora->modelo }}</h6>
                                                    <h6><u>Serial:</u> {{ $impresora->serial }}</h6>
                                                    @switch($impresora->estado)
                                                        @case(1)
                                                            <h6><u>Activo:</u> <i class="fas fa-check" style="color:green"></i></h6>    
                                                            @break
                                                        @case(2)
                                                            <h6><u>En Reparación:</u> <i class="fas fa-bomb" style="color:brown"></i></h6>
                                                            @break
                                                        @case(3)
                                                            <h6><u>Hurtado:</u> <i class="fas fa-ghost" style="color:rgb(8, 7, 90)"></i></h6>
                                                        @break
                                                        @default
                                                            <h6><u>Dado de Baja</u> <i class="fas fa-trash" style="color:red"></i></h6>
                                                    @endswitch
                                                   {{--  @if ($impresora->estado == 1)
                                                        <h6><u>Activo:</u> <i class="fas fa-check" style="color:green"></i>
                                                        </h6>
                                                    @else
                                                        @if ($impresora->estado == 0)
                                                            <h6><u>Dado de Baja</u> <i class="fas fa-trash"
                                                                    style="color:red"></i></h6>
                                                        @elseif ($impresora->estado == 2)
                                                            <h6><u>En Reparación:</u> <i class="fas fa-bomb"
                                                                    style="color:brown"></i></h6>
                                                        @endif
                                                    @endif --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="card card-dark" style="max-width: full;">
                                            <div class="card-header">
                                                <h3 class="card-title">Impresora</h3>
                                            </div>
                                            <div class="card-body">
                                                <h6>Sin Impresora Asignada</h6>
                                            </div>
                                        </div>
                                    @endif
    
                                    {{-- Scanners --}}
                                    @if ($scanners->count())
                                        @foreach ($scanners as $scanner)
                                            <div class="card card-danger" style="max-width: full;">
                                                <div class="card-header">
                                                    <h3 class="card-title">Scanner ID: {{ $scanner->id }}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <h6><u>Nombre:</u> {{ $scanner->nombre }}</h6>
                                                    <h6><u>Descripción:</u> {{ $scanner->descripcion }}</h6>
                                                    <h6><u>Modelo:</u> {{ $scanner->modelo }}</h6>
                                                    <h6><u>Serial:</u> {{ $scanner->serial }}</h6>
                                                    @switch($scanner->estado)
                                                        @case(1)
                                                            <h6><u>Activo:</u> <i class="fas fa-check" style="color:green"></i></h6>    
                                                            @break
                                                        @case(2)
                                                            <h6><u>En Reparación:</u> <i class="fas fa-bomb" style="color:brown"></i></h6>
                                                            @break
                                                        @case(3)
                                                            <h6><u>Hurtado:</u> <i class="fas fa-ghost" style="color:rgb(8, 7, 90)"></i></h6>
                                                        @break
                                                        @default
                                                            <h6><u>Dado de Baja</u> <i class="fas fa-trash" style="color:red"></i></h6>
                                                    @endswitch
                                                    {{-- @if ($scanner->estado == 1)
                                                        <h6><u>Activo:</u> <i class="fas fa-check" style="color:green"></i>
                                                        </h6>
                                                    @else
                                                        @if ($scanner->estado == 0)
                                                            <h6><u>Dado de Baja</u> <i class="fas fa-trash"
                                                                    style="color:red"></i></h6>
                                                        @elseif ($scanner->estado == 2)
                                                            <h6><u>En Reparación:</u> <i class="fas fa-bomb"
                                                                    style="color:brown"></i></h6>
                                                        @endif
                                                    @endif --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="card card-danger" style="max-width: full;">
                                            <div class="card-header">
                                                <h3 class="card-title">Scanner</h3>
                                            </div>
                                            <div class="card-body">
                                                <h6>Sin Scanner Asignado</h6>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        @else
                            @if ($puesto->equipamiento->estado == 0)
                                <p>Sin Equipamiento Asignado</p>
                            @else
                                <p>Equipamiento en Reparación</p>
                            @endif
                        @endif
                    </div>
                    <div class="tab-pane fade" id="imagenes-desc" role="tabpanel" aria-labelledby="imagenes-desc-tab">
                        <div class="row">
                            @if ($puesto->imagenes->count())
                                @foreach ($puesto->imagenes as $imagen)
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <div class="callout callout-info mr-3">
                                            <div class="image-wrapper">
                                                <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($imagen->url)}}" alt="Imagen del Puesto de Trabajo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach    
                            @else
                                <p>No hay imágenes Asociadas al Puesto de Trabajo.</p>
                            @endif
                        </div>

                        {{-- <div class="callout callout-info">
                            <h5>Descripción:</h5>
                            <p>{{$puesto->equipamiento->descripcion}}</p>
                            <p>Fecha Actualización: {{$puesto->equipamiento->fecha_actualizacion}}</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style> --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
