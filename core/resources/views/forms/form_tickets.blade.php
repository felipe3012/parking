 <div class="item form-group">
    {!!Html::decode(Form::label('placa', 'Placa del Vehiculo<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('placa', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('id_tipo_vehiculo', 'Tipo de Vehiculo <span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::select('id_tipo_vehiculo', [""=>"Seleccione..."]+$tipoVehiculo, null, ['class'=>'form-control']) !!} 
        <div class="help-block with-errors">
        </div> 
    </div>
</div> 

<div class="item form-group">
    {!!Html::decode(Form::label('fecha_fin', 'Fecha y Hora de Salida', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('fecha_fin', null,['class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('servicio', 'Servicio <span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('servicio', [""=>"Seleccione..."]+$servicio, null, ['class'=>'form-control']) !!} 
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('estado', 'Estado Ticket <span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::select('estado', [""=>"Seleccione..."]+config('domains.Estado'), null, ['class'=>'form-control']) !!} 
        <div class="help-block with-errors">
        </div> 
    </div>
</div> 