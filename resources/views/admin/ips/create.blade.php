@extends('adminlte::page')

@section('title', "Inventario Ip's")

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.ips.index') }}">Volver al Índice</a>
    <h1>Crear Ip</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.ips.store']) !!}

                @include('admin.ips.partials.form')

                {!! Form::submit('Crear Ip', ['class' => 'btn btn-primary']) !!}
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