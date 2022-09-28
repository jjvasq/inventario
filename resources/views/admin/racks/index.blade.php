@extends('adminlte::page')

@section('title', 'Inventario Racks')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.racks.create')}}">Crear Rack</a>
    <h1>Listado de Rack's:</h1>
@stop

@section('content')
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Referencia</th>
                <th>Planta</th>
                <th>Fecha Limpieza</th>
                <th colspan="2" class="text-bold text-danger text-center">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($racks as $rack)
                <tr>
                    <td>{{$rack->id}}</td>
                    <td>{{$rack->nombre}}</td>
                    <td>{{$rack->descripcion}}</td>
                    <td>
                        @if ($rack->referencia_lugar == null)
                            <p class="text-warning">Sin Referencia</p>
                        @else
                            {{$rack->referencia_lugar}}    
                        @endif
                    </td>
                    <td>
                        @if ($rack->planta == 1)
                            <small class="text-success">P. Alta</small>
                        @else
                            <small class="text-danger">P. Baja</small>
                        @endif
                    </td>
                    <td>{{$rack->fecha_limpieza}}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.racks.edit', $rack)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.racks.destroy', $rack)}}" method="POST">
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop