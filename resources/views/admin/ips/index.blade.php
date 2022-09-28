@extends('adminlte::page')

@section('title', "Inventario IP's")

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.ips.create')}}">Crear Ip</a>
    <h1>Listado de Ip's:</h1>
@stop

@section('content')

{{-- <p>Hola mundo</p> --}}
    @livewire('admin.ips-index')
    {{-- <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>IP</th>
                    <th>Estado</th>
                    <th colspan="2" class="text-bold text-danger text-center">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ips as $ip)
                    <tr>
                        <td>{{$ip->id}}</td>
                        <td>{{$ip->direccion_ip}}</td>
                        <td>
                            @if ($ip->estado == 1)
                                <small class="text-success">Activo</small>
                            @else
                                <small class="text-info">LIBRE</small>
                            @endif
                        </td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.ips.edit', $ip)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.ips.destroy', $ip)}}" method="POST">
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
        {{$ips->links()}}
    </div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop