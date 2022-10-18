@extends('adminlte::page')

@section('title', 'Inventario CPUs')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.cpus.index') }}">Volver al Índice</a>
    <h1>Editar CPU:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($cpu, ['route' => ['admin.cpus.update', $cpu], 'method' => 'put']) !!}

                @include('admin.cpus.partials.form')

                {!! Form::submit('Actualizar CPU', ['class' => 'btn btn-primary']) !!}
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