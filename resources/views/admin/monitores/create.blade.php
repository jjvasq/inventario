@extends('adminlte::page')

@section('title', 'Inventario Monitor')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.monitores.index') }}">Volver al Índice</a>
    <h1>Crear Monitor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.monitores.store']) !!}

                
                @include('admin.monitores.partials.form')

                {!! Form::submit('Crear Monitor', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <style>
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
    </style> --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
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
    </script>
    <script> console.log('Hi!'); </script>
@stop