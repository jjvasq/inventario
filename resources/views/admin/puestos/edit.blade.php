@extends('adminlte::page')

@section('title', 'Puestos - ADMIN')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.puestos.index') }}">Volver al Índice</a>
    <h1>Editar Puesto:</h1>
@stop

@section('content')
<div class="card">
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    @foreach ($puestos as $puesto)
        @if ($puesto->conectada_rack)
            <div class="card-body" x-data="data()" x-init="start()">    
        @else
            <div class="card-body" x-data="data()" x-init="start2()">
        @endif
        
            {!! Form::model($puesto, ['route' => ['admin.puestos.update', $puesto], 'method' => 'put']) !!}
                @include('admin.puestos.partials.form-edit')
                @livewire('admin.puestos.puestos-create')
                @if ($puesto->en_uso == 0)
                    @include('admin.puestos.partials.form-enuso')
                    @livewire('admin.puestos.busqueda-ip')    
                @endif
                {{-- @livewire('admin.puestos.busqueda-ip') --}}

                {!! Form::submit('Actualizar Puesto', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}    
        </div>
    @endforeach
</div>
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
                    this.open_ip = false;
                },
                start2(){
                    this.open_conexion = false;
                    this.open_ip = false;
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
    <script> console.log('Hi!'); </script>
@stop