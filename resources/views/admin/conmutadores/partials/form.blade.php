<div class="form-group">
    {!! Form::label('numero', 'Número') !!}
    {{-- {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Número de Switch']) !!} --}}
    {!! Form::number('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Número de Switch']) !!}

    @error('numero')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Marca del Switch']) !!}
    @error('marca')
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
    {!! Form::label('referencia_lugar', 'Referencia:') !!}
    {!! Form::text('referencia_lugar', null, ['class' => 'form-control', 'placeholder' => 'Lugar de Referencia']) !!}
    @error('referencia_lugar')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_limpieza', 'Fecha de Limpieza:', ['class' => 'mr-3']) !!}
    {!! Form::date('fecha_limpieza', \Carbon\Carbon::now()) !!}

    {{-- @error('fecha_limpieza')
        <span class="text-danger">{{$message}}</span>
    @enderror --}}
</div>

<div class="form-group">
    {!! Form::label('sector_id', 'Sector') !!}
    {!! Form::select('sector_id', $sectores, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
</div>

<div class="form-group">
    {!! Form::label('rack_id', 'Rack') !!}
    {!! Form::select('rack_id', $racks, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
</div>
{{-- <div class="row mt-4">
    <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                role="tab" aria-controls="product-desc" aria-selected="true">Rack</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments"
                role="tab" aria-controls="product-comments" aria-selected="false">Sector (Si Corresponde)</a>
        </div>
    </nav>
    <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum
            primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit,
            augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor
            fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed
            venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat
            erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna
            pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus
            erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non
            convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla
            sollicitudin ultrices vel metus. </div>
        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus
            rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti.
            Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio.
            Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare,
            eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula
            rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor.
            Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel,
            tincidunt ipsum. </div>
    </div>
</div> --}}
