<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre del Puesto']) !!}

    @error('nombre')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del Puesto', 'readonly']) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción/Detalle']) !!}
    {{-- @error('descripcion')
        <span class="text-danger">{{ $message }}</span>
    @enderror --}}
</div>

<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', $estados, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('referencia_lugar', 'Referencia:') !!}
    {!! Form::text('referencia_lugar', null, [
        'class' => 'form-control',
        'placeholder' => '...Ej: Frente a Personal',
    ]) !!}
    @error('referencia_lugar')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_limpieza', 'Fecha de Limpieza:', ['class' => 'mr-3']) !!}
    {!! Form::date('fecha_limpieza', \Carbon\Carbon::now()) !!}
</div>

<div class="form-group">
    {!! Form::label('sector_id', 'Sector:') !!}
    {!! Form::select('sector_id', $sectores, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion_equipamiento', 'Descripción Equipamiento:') !!}
    {!! Form::text('descripcion_equipamiento', null, [
        'class' => 'form-control',
        'placeholder' => '...Una descripción',
    ]) !!}
</div>

<h5>Datos de Conexión:</h5>
<div class="row">
    <div class="col-12 col-md-3 form-group">
        <p class="font-weight-bold float-left mr-2">Conectado a Rack:</p>
        <label class="mr-3">
            {!! Form::radio('conectada_rack', 1) !!}
            Si
        </label>
        <label class="mr-3">
            {!! Form::radio('conectada_rack', 0) !!}
            No
        </label>
    </div>
    <div class="col-12 col-md-3 form-group">
        {!! Form::label('boca_patch', 'Boca Patch:') !!}
        {!! Form::number('boca_patch', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-12 col-md-3 form-group">
        {!! Form::label('boca_switch', 'Boca Switch:') !!}
        {!! Form::number('boca_switch', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-12 col-md-3 form-group">
        {!! Form::label('fecha_impactada', 'Fecha Impactada:', ['class' => 'mr-3']) !!}
        {!! Form::date('fecha_impactada', \Carbon\Carbon::now()) !!}
    </div>
</div>    

