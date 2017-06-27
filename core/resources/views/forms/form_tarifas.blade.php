<div class="item form-group">
    {!!Html::decode(Form::label('id_tipo_vehiculo', 'Tipo Vehiculo <span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('id_tipo_vehiculo', [""=>"Seleccione un tipo de vehiculo"]+$tipovehiculos, null, ['class'=>'form-control']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('valor', 'Valor<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::number('valor', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

