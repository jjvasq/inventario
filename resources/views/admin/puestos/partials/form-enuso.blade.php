<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <p class="font-weight-bold float-left mr-2">En Uso:</p>
            <label class="mr-3" x-on:click="openIp()">
                {!! Form::radio('en_uso', 1, true) !!}
                Si
            </label>
            <label class="mr-3" x-on:click="closeIp()">
                {!! Form::radio('en_uso', 0) !!}
                No
            </label>
        </div>
    </div>
</div>