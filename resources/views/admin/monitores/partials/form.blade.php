<div class="row">
    <div class="col-12 col-md-4 form-group">
        {!! Form::label('marca', 'Marca') !!}
        {!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Marca del Monitor']) !!}
    
        @error('marca')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    
    <div class="col-12 col-md-4 form-group">
        {!! Form::label('tamanio', 'Tamaño') !!}
        {!! Form::text('tamanio', '19 Pulgadas', ['class' => 'form-control', 'placeholder' => 'Tamaño']) !!}
        @error('tamanio')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    
    <div class="col-12 col-md-4 form-group">
        {!! Form::label('modelo', 'Modelo:') !!}
        {!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Modelo del Monitor']) !!} 
        @error('modelo')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 form-group">
        {!! Form::label('serial', 'Serial:') !!}
        {!! Form::text('serial', null, ['class' => 'form-control', 'placeholder' => 'Serial']) !!} 
        @error('serial')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    
    <div class="col-12 col-md-4 form-group">
        {!! Form::label('patrimonial', 'Patrimonial:') !!}
        {!! Form::text('patrimonial', null, ['class' => 'form-control', 'placeholder' => '-']) !!}
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

{{-- <div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($monitore->imagen)
                <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($monitore->imagen->url)}}" alt="Imagen del Monitor">
            @else
                <img class="img-fluid rounded-sm" id="picture" src="https://images.pexels.com/photos/439803/pexels-photo-439803.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Imagen por defecto">        
            @endisset
        </div>
        
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará del Monitor') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        
        <p>Tener en cuenta que se trata de una imágen ilustrativa.</p>
        <p>La finalidad es la de poder tener una aproximación visual del Monitor al que hace referencia.</p>
        <p>Si bien los datos son van a ser considerados válidos, esta imágen no va a ser utilizada para contrastar la veracidad de la información del Sistema.</p>
    </div>
</div> --}}