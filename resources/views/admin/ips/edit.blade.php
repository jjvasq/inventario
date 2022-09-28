@extends('adminlte::page')

@section('title', "Inventario Ip's")

@section('content_header')
    <h1>Editar Ip:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($ip, ['route' => ['admin.ips.update', $ip], 'method' => 'put']) !!}

                @include('admin.ips.partials.form')

                {!! Form::submit('Actualizar Ip', ['class' => 'btn btn-primary']) !!}
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