@extends('adminlte::page')

@section('title', 'Switchs - ADMIN')

@section('content_header')
    <h1>Crear Switch</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.conmutadores.store']) !!}

            @include('admin.conmutadores.partials.form')

            <div class="form-group">
                {!! Form::label('rack_id', 'Rack') !!}
                {!! Form::select('rack_id', $racks, null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Crear Switch', ['class' => 'btn btn-primary']) !!}
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