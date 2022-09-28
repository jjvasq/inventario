<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Sector']) !!}

    @error('nombre')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del Sector', 'readonly']) !!}
    
    @error('slug')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción del Sector']) !!} 
    @error('descripcion')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('referencia_lugar', 'Referencia:') !!}
    {!! Form::text('referencia_lugar', null, ['class' => 'form-control', 'placeholder' => 'Lugar de Referencia']) !!} 
    @error('referencia_lugar')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Planta:</p>
    <label class="mr-3">
        {!! Form::radio('planta', 1, true) !!}
        Alta
    </label>
    <label class="mr-3">
        {!! Form::radio('planta', 0) !!}
        Baja
    </label>
</div>