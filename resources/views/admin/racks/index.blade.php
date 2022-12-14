@extends('adminlte::page')

@section('title', 'Inventario Racks')

@section('content_header')
    {{-- <a class="btn btn-info float-right" onclick="muestraSweet()">Swit Alert</a> --}}
    <a class="btn btn-secondary float-right" href="{{ route('admin.racks.create') }}">Crear Rack</a>
    <h1>Listado de Rack's:</h1>
@stop

@section('content')
    @livewire('admin.racks-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function muestraSweet() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El botón está funcionando.!',
                showConfirmButton: false,
                timer: 3500
            })
        }
    </script>

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
    <script>
        console.log('Hi!');
    </script>
@stop
