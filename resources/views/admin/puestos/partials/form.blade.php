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
    @error('descripcion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', $estados, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('referencia_ubicacion', 'Referencia:') !!}
    {!! Form::text('referencia_ubicacion', null, ['class' => 'form-control', 'placeholder' => '...Ej: Frente a Personal']) !!}
    @error('referencia_ubicacion')
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
    {!! Form::text('descripcion_equipamiento', null, ['class' => 'form-control', 'placeholder' => '...Una descripción']) !!}
    @error('descripcion_equipamiento')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<h5>Datos de Conexión:</h5>
<div class="row">
    <div class="col-12 col-md-3 form-group">
        {!! Form::label('boca_patch', 'Boca Patch:') !!}
        {!! Form::number('boca_patch', 0, ['class' => 'form-control']) !!}
    </div>
    <div class="col-12 col-md-3 form-group">
        {!! Form::label('boca_switch', 'Boca Switch:') !!}
        {!! Form::number('boca_switch', 0, ['class' => 'form-control']) !!}
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <p class="font-weight-bold float-left mr-2">Conectado a Rack:</p>
            <label class="mr-3">
                {!! Form::radio('conectada_rack', 1, true) !!}
                Si
            </label>
            <label class="mr-3">
                {!! Form::radio('conectada_rack', 0) !!}
                No
            </label>
        </div>
        <hr>
        <div class="form-group">
            <p class="font-weight-bold float-left mr-2">En Uso:</p>
            <label class="mr-3">
                {!! Form::radio('en_uso', 1, true) !!}
                Si
            </label>
            <label class="mr-3">
                {!! Form::radio('en_uso', 0) !!}
                No
            </label>
        </div>
    </div>
    <div class="col-12 col-md-3 form-group">
        {!! Form::label('fecha_impactada', 'Fecha Impactada:', ['class' => 'mr-3']) !!}
        {!! Form::date('fecha_impactada', \Carbon\Carbon::now()) !!}
    </div>
    
</div>


{{-- <div class="form-group">
    {!! Form::label('conexion_id', 'Conexión:') !!}
    {!! Form::select('conexion_id', $conexiones, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
</div> --}}

{{-- <div class="form-group">
    {!! Form::label('equipamiento_id', 'Equipamiento:') !!}
    {!! Form::select('equipamiento_id', $equipamientos, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
</div> --}}