@extends('adminlte::page')

@section('title', 'Scanners - ADMIN')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.scanners.index') }}">Volver al Índice</a>
    <h1>Editar Scanner:</h1>
@stop

@section('content')
<div class="card">
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card-body">
        {!! Form::model($scanner, ['route' => ['admin.scanners.update', $scanner], 'method' => 'put']) !!}
            @include('admin.scanners.partials.form')

            {!! Form::submit('Actualizar Scanner', ['class' => 'btn btn-primary']) !!}
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
    <script> console.log('Hi!'); </script>
@stop