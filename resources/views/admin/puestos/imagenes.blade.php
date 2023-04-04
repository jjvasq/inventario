@extends('adminlte::page')

@section('title', 'Puesto Imágenes')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('admin.puestos.index') }}"><i class="fas fa-undo"></i> Volver al Índice</a>
    <a class="float-right btn btn-success mr-4"
        href="{{ route('admin.imagenPuestos.create', $puesto) }}">
        <i class="fas fa-plus"></i> Agregar Imágenes
    </a>
    <h3>Imagenes de Puesto: {{$puesto->slug}}</h3>
@stop

@section('content')
    <div class="card">
     
        @if ($imagenes->count())
            <div class="card-body">
                <div class="row">
                @foreach ($imagenes as $imagen)
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="image-wrapper">
                                    <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($imagen->url)}}" alt="Imagen de Puesto">
                                </div>
                            </div>
                            <div class="card-footer">
                                <form class="formulario-eliminar"
                                        action="{{ route('admin.imagenPuestos.destroy', $imagen) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
           
        @else
            <div class="card-body">
                <h5>No hay imágenes del Puesto</h5>
            </div>
        @endif
        
       
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
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('info') == 'imagen')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'La imagen se subió correctamente',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se Eliminó Correctamente.!',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro de Eliminar?',
                text: "No se podrá revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    /* Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ) */
                }
            })
        });
    </script>
    <script> console.log('Hi!'); </script>
@stop
