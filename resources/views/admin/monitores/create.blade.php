@extends('adminlte::page')

@section('title', 'Inventario Monitor')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.monitores.index') }}">Volver al Índice</a>
    <h1>Crear Monitor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.monitores.store']) !!}

                
                @include('admin.monitores.partials.form')

                {!! Form::submit('Crear Monitor', ['class' => 'btn btn-primary']) !!}
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