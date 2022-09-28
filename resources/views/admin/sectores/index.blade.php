@extends('adminlte::page')

@section('title', 'Inventario - ADMIN')

@section('content_header')
    <h1>Listado de Sectores:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-header">
            <a class="btn btn-secondary" href="{{route('admin.sectores.create')}}">Crear Sector</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Referencia</th>
                        <th>Planta</th>
                        <th colspan="2" class="text-bold text-danger text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sectores as $sector)
                        <tr>
                            <td>{{$sector->id}}</td>
                            <td>{{$sector->nombre}}</td>
                            <td>{{$sector->descripcion}}</td>
                            <td>{{$sector->referencia_lugar}}</td>
                            <td>
                                @if ($sector->planta == 1)
                                    <small class="text-success">P. Alta</small>
                                @else
                                    <small class="text-danger">P. Baja</small>
                                @endif
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.sectores.edit', $sector)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.sectores.destroy', $sector)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="card-footer">
            {{-- {{$sectores->links()}} --}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop