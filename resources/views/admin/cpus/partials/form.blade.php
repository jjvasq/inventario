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
        @error('procesador')
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

{{-- <div class="row">
    <div class="form-group col-12 col-md-6">
        {!! Form::label('disco_tec', 'Disco-Tecnología:') !!}
        {!! Form::text('disco_tec', 'ssd', ['class' => 'form-control', 'placeholder' => 'SSD']) !!}
    </div>
    
    <div class="form-group col-12 col-md-6">
        {!! Form::label('disco_cap', 'Disco-Capacidad (GB):') !!}
        {!! Form::number('disco_cap', 240, ['class' => 'form-control', 'placeholder' => 'Cantidad en GB (ej: 240)']) !!}
    </div>
</div> --}}

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
        <h5 class="text-bold">Disco</h5>
        <div class="form-group">
            {!! Form::label('disco_tec', 'Tecnología:') !!}
            {!! Form::text('disco_tec', 'ssd', ['class' => 'form-control', 'placeholder' => 'SSD']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('disco_cap', 'Capacidad (GB):') !!}
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

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($cpu->image)
                <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($cpu->image->url)}}" alt="Imagen del CPU">
            @else
                <img class="img-fluid rounded-sm" id="picture" src="https://images.pexels.com/photos/6913135/pexels-photo-6913135.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen por defecto">
                
            @endisset
        </div>
        
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará del CPU') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        
        <p>Tener en cuenta que se trata de una imágen ilustrativa.</p>
        <p>La finalidad es la de poder tener una aproximación visual al Cpu al que hace referencia.</p>
        <p>Si bien los datos son van a ser considerados válidos, esta imágen no va a ser utilizada para contrastar la veracidad de la información del Sistema.</p>
    </div>
</div>