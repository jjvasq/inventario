@extends('adminlte::page')

@section('title', 'Inventario - ADMIN')

@section('content_header')
    {{-- <h4>Inventario:</h4> --}}
@stop

@section('content')
    @livewire('admin.principal-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop