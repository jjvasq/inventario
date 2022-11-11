<div class="row">
    <div class="form-group col-12 col-md-6">
        {!! Form::label('macaddress', 'Macaddress:') !!}
        {!! Form::text('macaddress', null, ['class' => 'form-control', 'placeholder' => 'Maccaddress del Mother CPU']) !!}
        @error('macaddress')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group col-12 col-md-6">
        {!! Form::label('procesador', 'Procesador:') !!}
        {!! Form::text('procesador', null, ['class' => 'form-control', 'placeholder' => 'Procesador (Intel I5 10ma)']) !!}
        @error('descripcion')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-12 col-md-4">
        {!! Form::label('ram_modelo', 'RAM-Mod:') !!}
        {!! Form::text('ram_modelo', null, ['class' => 'form-control', 'placeholder' => 'DDR 4 ...']) !!}
        @error('ram_modelo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group col-12 col-md-4">
        {!! Form::label('ram_cant_gb', 'RAM-Cant:') !!}
        {{-- {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Número de Switch']) !!} --}}
        {!! Form::number('ram_cant_gb', null, ['class' => 'form-control', 'placeholder' => 'Cantidad en GB (ej: 8)']) !!}
        @error('ram_cant_gb')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group col-12 col-md-4">
        {!! Form::label('sistema_operativo', 'Sistema Operativo:') !!}
        {!! Form::text('sistema_operativo', null, ['class' => 'form-control', 'placeholder' => 'W10 ...']) !!}
        @error('sistema_operativo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-12 col-md-6">
        {!! Form::label('disco_tec', 'Disco-Tecnología:') !!}
        {!! Form::text('disco_tec', 'ssd', ['class' => 'form-control', 'placeholder' => 'SSD']) !!}
    </div>
    
    <div class="form-group col-12 col-md-6">
        {!! Form::label('disco_cap', 'Disco-Capacidad (GB):') !!}
        {!! Form::number('disco_cap', 240, ['class' => 'form-control', 'placeholder' => 'Cantidad en GB (ej: 240)']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-12 col-md-8">
        {!! Form::label('descripcion', 'Descripción:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción del CPU']) !!}
        
        @error('descripcion')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="col-12 col-md-4">
        <div class="form-group">
            {!! Form::label('patrimonial', 'Patrimonial:') !!}
            {!! Form::text('patrimonial', null, ['class' => 'form-control', 'placeholder' => '-']) !!}
        </div>
        <div class="form-group mt-5">
            {!! Form::label('disco_tec', 'Disco-Tecnología:') !!}
            {!! Form::text('disco_tec', 'ssd', ['class' => 'form-control', 'placeholder' => 'SSD']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('disco_cap', 'Disco-Capacidad (GB):') !!}
            {!! Form::number('disco_cap', 240, ['class' => 'form-control', 'placeholder' => 'Cantidad en GB (ej: 240)']) !!}
        </div>
    </div>
    
</div>


<div class="row">
    <div class="form-group col-12 col-md-4">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::select('estado', $estados, null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group col-12 col-md-8">
        {!! Form::label('equipamiento_id', 'Equipamiento:') !!}
        {!! Form::select('equipamiento_id', $equipamientos, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
    </div>
</div>