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
            {!! Form::model($cpu, ['route' => ['admin.cpus.update', $cpu], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

                @include('admin.cpus.partials.form')

                {!! Form::submit('Actualizar CPU', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

//No se utiliza porque estamos haciendo la carga de imagenes desde afuera.
   {{--  <script>
        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script> --}}

    <script> console.log('Hi!'); </script>
@stop