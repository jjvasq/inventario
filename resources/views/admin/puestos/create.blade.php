@extends('adminlte::page')

@section('title', 'Puestos - ADMIN')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.puestos.index') }}">Volver al Índice</a>
    <h1>Crear Puesto:</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body" x-data="data()" x-init="start()">
            {!! Form::open(['route' => 'admin.puestos.store']) !!}
                @include('admin.puestos.partials.form')
                @livewire('admin.puestos.puestos-create')
                @livewire('admin.puestos.busqueda-ip')
                
            {!! Form::submit('Crear Puesto', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    {{-- <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.puestos.store']) !!}

            @include('admin.puestos.partials.form')

            {!! Form::submit('Crear Puesto', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
    <script>
        function data(){
            return{
                open_conexion: null,
                open_ip: null,
                start(){
                    this.open_conexion = true;
                    this.open_ip = true;
                },
                openConexion(){
                    this.open_conexion = true;
                },
                closeConexion(){
                    this.open_conexion = false;
                },
                openIp(){
                    this.open_ip = true;
                },
                closeIp(){
                    this.open_ip = false;
                },
            }
        }
    </script>

    <script src="//unpkg.com/alpinejs"></script>

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
    <script>
        console.log('Hi!');
    </script>
@stop
