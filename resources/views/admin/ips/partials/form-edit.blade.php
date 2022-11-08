<div class="form-group">
    {!! Form::label('direccion_ip', 'Dirección Ip:') !!}
    {!! Form::text('direccion_ip', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Dirección IP:']) !!}

    @error('direccion_ip')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>