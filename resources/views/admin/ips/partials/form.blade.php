<div class="form-group">
    {!! Form::label('direccion_ip', 'Dirección Ip:') !!}
    {!! Form::text('direccion_ip', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Dirección IP:']) !!}

    @error('direccion_ip')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold float-left mr-2">Estado:</p>
    <label class="mr-3">
        {!! Form::radio('estado', 1, true) !!}
        Activo
    </label>
    <label class="mr-3">
        {!! Form::radio('estado', 0) !!}
        Libre
    </label>
</div>