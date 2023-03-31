@extends('adminlte::page')

@section('title', 'Inventario Monitor')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.monitores.index') }}">Volver al Índice</a>
    <h1>Info de Monitor:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
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
                                <div class="callout callout-info col-4 col-lg-5">
                                    <h5>Marca:</h5>
                                    <p>{{$monitor->marca}}</p>
                                </div>

                                <div class="callout callout-success col-4 col-lg-5">
                                    <h5>Tamaño:</h5>
                                    <p>{{$monitor->tamanio}}</p>
                                </div>
                                <div class="col-4 col-md-3 col-lg-2">
                                    <h5>Estado:</h5>
                                    @if ($monitor->estado==1)
                                        <button type="button" class="btn btn-success btn-block"><i class="fa fa-check"></i> Activo</button>
                                    {{-- <span class="badge bg-success">Activo</span> --}}
                                    @else
                                        @if ($monitor->estado==0)
                                            <button type="button" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Baja</button>
                                        @else
                                            @if ($monitor->estado==2)
                                                <button type="button" class="btn btn-warning btn-block"><i class="fa fa-bolt"></i> En Reparación</button>
                                            @else
                                                <button type="button" class="btn btn-dark btn-block"><i class="fa fa-eye"></i> Hurtado</button>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="callout callout-warning col-4">
                                    <h5>Modelo</h5>
                                    <p>{{$monitor->modelo}}</p>
                                </div>
                                <div class="col-4 callout callout-success">
                                    <h5>Serial:</h5>
                                    <p>{{$monitor->serial}}</p>
                                </div>
                                <div class="col-4 callout callout-info">
                                    <h5>Patrimonial:</h5>
                                    @if ($monitor->patrimonial != null)
                                        <p>{{$monitor->patrimonial}}</p>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
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
                                <div class="col">
                                    <div class="image-wrapper">
                                        @isset ($monitor->image)
                                            <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($monitor->image->url)}}" alt="Imagen del Monitor">
                                        @else
                                            <img class="img-fluid rounded-sm" id="picture" src="https://images.pexels.com/photos/6913135/pexels-photo-6913135.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen por defecto">
                                        @endisset
                                    </div>
                                </div>
                                <div class="col">
                                    @isset ($monitor->image)
                                        <p>Imágen correspondiente al Monitor del Equipo.</p>
                                        <p>Tener en cuenta que los datos de la imagen son subjetivos, los que van a considerarse son los ingresados en la BD.</p>
                                    @else
                                        <p>Tener en cuenta que se trata de una imágen ilustrativa.</p>
                                        <p class="text-bold">En este caso se trata de una imagen default</p>
                                    @endisset
                                </div>
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
    <script> console.log('Hi!'); </script>
@stop