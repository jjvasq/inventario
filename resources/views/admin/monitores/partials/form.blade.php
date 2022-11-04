<div class="form-group">
    {!! Form::label('marca', 'Marca') !!}
    {!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Marca del Monitor']) !!}

    @error('marca')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('tamanio', 'Tamaño') !!}
    {!! Form::text('tamanio', '19 Pulgadas', ['class' => 'form-control', 'placeholder' => 'Tamaño']) !!}
    @error('tamanio')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Modelo del Monitor']) !!} 
    @error('modelo')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('serial', 'Serial:') !!}
    {!! Form::text('serial', null, ['class' => 'form-control', 'placeholder' => 'Serial']) !!} 
    @error('serial')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('patrimonial', 'Patrimonial:') !!}
    {!! Form::text('patrimonial', null, ['class' => 'form-control', 'placeholder' => '-']) !!}
</div>

<div class="form-group">
    {!! Form::label('estado', 'Estado') !!}
    {!! Form::select('estado', $estados, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('equipamiento_id', 'Equipamiento:') !!}
    {!! Form::select('equipamiento_id', $equipamientos, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
</div>