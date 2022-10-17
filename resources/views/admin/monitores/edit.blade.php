@extends('adminlte::page')

@section('title', 'Inventario Monitores')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.monitores.index') }}">Volver al Índice</a>
    <h1>Editar Monitor:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($monitore, ['route' => ['admin.monitores.update', $monitore], 'method' => 'put']) !!}

                @include('admin.monitores.partials.form')

                {!! Form::submit('Actualizar Monitor', ['class' => 'btn btn-primary']) !!}
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