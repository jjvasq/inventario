@extends('adminlte::page')

@section('title', 'Inventario CPU')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.cpus.index') }}">Volver al Índice</a>
    <h1>Info de CPU:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
        <div class="card-body">

            <div id="accordion">
                <div class="card card-info">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                Datos Relevantes
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="row">
                                <div class="callout callout-info col-5 col-md-5">
                                    <h5>Macaddress:</h5>
                                    <p>{{$cpu->macaddress}}</p>
                                </div>
                                <div class="col-4 col-md-5 callout callout-success">
                                    <h5>Procesador:</h5>
                                    <p>{{$cpu->procesador}}</p>
                                </div>
                                
                                <div class="col-3 col-md-2">
                                    <h5>Estado:</h5>
                                    @if ($cpu->estado==1)
                                        <button type="button" class="btn btn-success btn-block"><i class="fa fa-check"></i> Activo</button>
                                    {{-- <span class="badge bg-success">Activo</span> --}}
                                    @else
                                        @if ($cpu->estado==0)
                                            <button type="button" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Baja</button>
                                        @else
                                            @if ($cpu->estado==2)
                                                <button type="button" class="btn btn-warning btn-block"><i class="fa fa-bolt"></i> En Reparación</button>
                                            @else
                                            <button type="button" class="btn btn-dark btn-block"><i class="fa fa-eye"></i> Hurtado</button>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                                

                            </div>
                            
                            <div class="row">
                                <div class="col-6 col-md-3 callout callout-info">
                                    <h5>Sistema Operativo:</h5>
                                    <p>{{$cpu->sistema_operativo}}</p>
                                </div>
                                <div class="col-6 col-md-3 callout callout-info">
                                    <h5>RAM:</h5>
                                    <p>{{$cpu->ram_cant_gb}} Gb - {{$cpu->ram_modelo}}</p>
                                </div>
                                <div class="col-6 col-md-3 callout callout-success">
                                    <h5>Disco:</h5>
                                    <p>{{$cpu->disco_tec}} - {{$cpu->disco_cap}}</p>
                                </div>
                                <div class="col-6 col-md-3 callout callout-info">
                                    <h5>Patrimonial</h5>
                                    @if ($cpu->patrimonial != null)
                                        <p>{{$cpu->patrimonial}}</p>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo"
                                aria-expanded="false">
                                Descripción
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                        <div class="card-body">
                            @if ($cpu->descripcion != null)
                                <div class="callout callout-info">
                                    <p>{{$cpu->descripcion}}</p>
                                </div>
                            @else
                                <div class="callout callout-info">
                                    <h6>Sin Descripción</h6>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree"
                                aria-expanded="false">
                                Imágenes
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="row">
                                @if ($cpu->imagenes->count())
                                    @foreach ($cpu->imagenes as $imagen)
                                        <div class="col-12 col-md-6 my-2">
                                            <div class="image-wrapper">
                                                <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($imagen->url)}}" alt="Imagen del CPU">
                                                {{-- @isset ($cpu->image)
                                                    
                                                @else
                                                    <img class="img-fluid rounded-sm" id="picture" src="https://images.pexels.com/photos/6913135/pexels-photo-6913135.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen por defecto">
                                                @endisset --}}
                                            </div>
                                        </div>
                                    @endforeach    
                                @else
                                    <p>No hay imágenes Asociadas al CPU.</p>
                                @endif
                                
                                {{-- <div class="col">
                                    @isset ($cpu->image)
                                        <p>Imágen correspondiente al CPU del Equipo.</p>
                                        <p>Tener en cuenta que se trata de una imágen ilustrativa.</p>
                                    @else
                                        <p>Tener en cuenta que se trata de una imágen ilustrativa.</p>
                                        <p class="text-bold">En este caso se trata de una imagen default</p>
                                    @endisset
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
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
    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
