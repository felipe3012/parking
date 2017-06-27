<div class="item form-group">
    {!!Html::decode(Form::label('pass', 'Actual', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']))!!}
    <div class="col-md-12 col-sm-12 col-xs-12">
        {!!Form::password('pass',['required', 'class'=>'form-control','data-error'=>'Campo requerido','data-remote'=>'/parking/path/to/remote/validator/','data-remote-error'=>'La contraseña es incorrecta'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<div class="item form-group">
    {!!Html::decode(Form::label('password', 'Contraseña', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']))!!}
    <div class="col-md-12 col-sm-12 col-xs-12">
        {!!Form::password('password',['id'=>'password','required','class'=>'form-control','data-error'=>'Campo requerido','data-minlength'=>'8','data-minlength-error'=>'Debe contener minimo 8 caracteres'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<div class="item form-group">
    {!!Html::decode(Form::label('pwc', 'Confirmar', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']))!!}
    <div class="col-md-12 col-sm-12 col-xs-12">
        {!!Form::password('pwc',['required','class'=>'form-control','data-error'=>'Campo requerido','data-match'=>'#password','data-match-error'=>'Las contraseñas no coinciden'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>