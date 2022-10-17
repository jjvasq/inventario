@extends('adminlte::page')

@section('title', 'Switchs - ADMIN')

@section('content_header')
    <h1>Switchs Edit - Administrador</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($conmutadore, ['route' => ['admin.conmutadores.update', $conmutadore], 'method' => 'put']) !!}

                @include('admin.conmutadores.partials.form')

                {!! Form::submit('Actualizar Switch', ['class' => 'btn btn-primary']) !!}
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