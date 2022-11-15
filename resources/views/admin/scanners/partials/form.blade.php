<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre del Scanner']) !!}

    @error('nombre')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del Scanner', 'readonly']) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="row">
    <div class="col-12 col-md-8 form-group">
        {!! Form::label('descripcion', 'Descripción:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción/Detalle']) !!}
        @error('descripcion')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 col-md-4">
        <div class="form-group mt-4">
            {!! Form::label('modelo', 'Modelo:') !!}
            {!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Scanner...']) !!}
            @error('modelo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            {!! Form::label('serial', 'Serial:') !!}
            {!! Form::text('serial', null, ['class' => 'form-control', 'placeholder' => '####']) !!}
            @error('serial')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            {!! Form::label('patrimonial', 'Patrimonial:') !!}
            {!! Form::text('patrimonial', null, ['class' => 'form-control', 'placeholder' => '-']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4 form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('estado', $estados, null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="col-12 col-md-8 form-group">
        {!! Form::label('equipamiento_id', 'Equipamiento:') !!}
        {!! Form::select('equipamiento_id', $equipamientos, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
    </div>
</div>
