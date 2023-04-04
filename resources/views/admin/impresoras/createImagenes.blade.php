@extends('adminlte::page')

@section('title', 'Impresora Imágenes')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.impresoras.index') }}"><i class="fas fa-undo"></i> Volver al Índice</a>
    <h3>Agregar Imagenes a Impresora: {{$impresora->slug}}</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Subir Imágenes</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="image-wrapper">
                        <img id="picture" src="https://cdn.pixabay.com/photo/2017/04/20/07/08/upload-2244780_640.png" alt="inserte">
                    </div>
                </div>
                <div class="col">
                    <form action="{{route('admin.imagenImpresoras.store', $impresora)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" id="file" accept="image/*">
                            <br>
                            @error('file')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Subir imagen</button>
                    </form>
                </div>
            </div>
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