@extends('adminlte::page')

@section('title', 'Impresoras - ADMIN')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.impresoras.index') }}">Volver al Índice</a>
    <h1>Crear Impresora</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.impresoras.store']) !!}

            @include('admin.impresoras.partials.form')

            {!! Form::submit('Crear Impresora', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
