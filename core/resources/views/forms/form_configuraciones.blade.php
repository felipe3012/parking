<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Nombre<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('nombre', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('nit', 'Nit<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('nit', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('direccion', 'Dirección<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('direccion', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('telefono', 'Telefono<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('telefono', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('logo', 'Logo<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::file('logo', ['class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
