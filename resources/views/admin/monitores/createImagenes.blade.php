@extends('adminlte::page')

@section('title', 'Monitor Imágenes')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.monitores.index') }}"><i class="fas fa-undo"></i> Volver al Índice</a>
    <h3>Agregar Imagenes a Monitor con id: {{$id}}</h3>
@stop

@section('content')
    {{-- <div class="card">
        <div class="card-body">
            <h1>Estoy en create imagenes del Monitor id:{{$id}}</h1>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-header">
            <h3>Subir Imágenes</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{route('admin.imagenMonitores.store2', $id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" id="" accept="image/*">
                            <br>
                            @error('file')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Subir imagen</button>
                    </form>

                    {{-- <form action=""
                        method="POST"
                        class="dropzone"
                        id="my-awesome-dropzone">
                    </form> --}}
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
    <script> console.log('Hi!'); </script>
@stop