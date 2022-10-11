@extends('adminlte::page')

@section('title', 'Inventario - ADMIN')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.sectores.create')}}">Crear Sector</a>
    <h1>Listado de Sectores:</h1>
@stop

@section('content')
    @livewire('admin.sectores-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/all.min.css')}}">
@stop

@section('js')
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('info') == 'El Sector se actualizó con éxito')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se Actualizó Correctamente.!',
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