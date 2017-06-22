<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Nombre<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('nombre', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('referencia', 'Referencia', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('referencia', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('icono', 'Icono', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('icono', null,['class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('peso', 'Peso <span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('peso', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Padre',  ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::select('padre', ['' => 'Seleccione una funcionalidad']+$funcionalidades, null, ['class' => 'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>