<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Nombre<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('nombre', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>