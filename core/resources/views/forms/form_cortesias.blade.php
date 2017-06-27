<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Nombre<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('name', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<div class="item form-group">
    {!!Html::decode(Form::label('email', 'Tiempo de Cortesia <span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
            {!! Form::text('tiempo_cortesia', null, ['class'=>"form-control"]) !!}
            <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
        </div>
        <div class="help-block with-errors">
        </div>
    </div>
</div>