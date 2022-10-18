<div class="form-group">
    {!! Form::label('macaddress', 'Macaddress:') !!}
    {!! Form::text('macaddress', null, ['class' => 'form-control', 'placeholder' => 'Maccaddress del Mother CPU']) !!}
    @error('macaddress')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('procesador', 'Procesador:') !!}
    {!! Form::text('procesador', null, ['class' => 'form-control', 'placeholder' => 'Procesador (Intel I5 10ma)']) !!}
    @error('descripcion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('ram_modelo', 'RAM-Mod:') !!}
    {!! Form::text('ram_modelo', null, ['class' => 'form-control', 'placeholder' => 'DDR 4 ...']) !!}
    @error('ram_modelo')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('ram_cant_gb', 'RAM-Cant:') !!}
    {{-- {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Número de Switch']) !!} --}}
    {!! Form::number('ram_cant_gb', null, ['class' => 'form-control', 'placeholder' => 'Cantidad en GB (ej: 8)']) !!}
    @error('ram_cant_gb')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('sistema_operativo', 'Sistema Operativo:') !!}
    {!! Form::text('sistema_operativo', null, ['class' => 'form-control', 'placeholder' => 'W10 ...']) !!}
    @error('sistema_operativo')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción del CPU']) !!}
    @error('descripcion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('estado', 'Estado') !!}
    {!! Form::select('estado', $estados, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('equipamiento_id', 'Equipamiento:') !!}
    {!! Form::select('equipamiento_id', $equipamientos, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
</div>