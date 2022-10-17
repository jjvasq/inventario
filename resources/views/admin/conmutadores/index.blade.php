@extends('adminlte::page')

@section('title', 'Switchs - ADMIN')

@section('content_header')
    {{-- <div class="btn-group float-right">
        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
            Crear Switch
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('admin.conmutadores.create') }}">Switch Sin Asignar</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.conmutadores.createSwitchSector') }}">Switch de Sector</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.conmutadores.createSwitchRack') }}">Switch de Rack</a></li>
        </ul>
    </div> --}}
    <a class="btn btn-secondary float-right" href="{{ route('admin.conmutadores.create') }}">Crear Switch</a>
    <h1>Lista de Switchs</h1>
@stop

@section('content')
    @livewire('admin.conmutadores-index')
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
