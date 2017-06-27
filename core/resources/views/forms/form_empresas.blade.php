<div class="item form-group">
    {!!Html::decode(Form::label('nit', 'Nit<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('nit', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Razón Social<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('nombre', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('contacto', 'Persona de contacto<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('contacto', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>


<div class="item form-group">
    {!!Html::decode(Form::label('direccion', 'Dirección<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('direccion', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('telefono', 'Telefono<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('telefono', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('correo', 'Correo<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('correo', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>