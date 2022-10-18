@extends('adminlte::page')

@section('title', 'Inventario CPU')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.cpus.index') }}">Volver al Índice</a>
    <h1>Crear CPU:</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.cpus.store']) !!}
                
                @include('admin.cpus.partials.form')

                {!! Form::submit('Crear CPU', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop