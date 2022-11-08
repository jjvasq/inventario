@extends('adminlte::page')

@section('title', "Inventario Ip's")

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.ips.index') }}">Volver al Índice</a>
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

                @if ($ip->estado == 1)
                    @include('admin.ips.partials.form-edit')
                @else
                    @include('admin.ips.partials.form')
                @endif
                
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