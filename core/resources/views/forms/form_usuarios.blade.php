<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Nombre<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('name', null,['required', 'class'=>'form-control col-md-7 col-xs-12', 'data-validate-length-range'=>'6' , 'id'=>'name','data-validate-words'=>'2'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<div class="item form-group">
    {!!Html::decode(Form::label('email', 'Email <span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::email('email', null,['required'=>'required' ,'id'=>'email', 'class'=>'form-control col-md-7 col-xs-12','data-remote'=>'/parking/path/to/remote/email/','data-remote-error'=>'El email definido no esta disponible'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<div class="item form-group">
    {!!Html::decode(Form::label('Contrasena', 'Contraseña
    <span class="required"> * </span>',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::password('password',['id'=>'password','required','data-validate-length'=>'6,8', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<div class="item form-group">
    {!!Html::decode(Form::label('contrasenacon', 'Confirmar Contraseña
    <span class="required">
        *
    </span>
    ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::password('password_confirmation',['required','data-match'=>'#password','data-match-error'=>'Las contraseñas no coinciden','class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Perfil
    <span class="required"> * </span>',  ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::select('id_perfil', ['' => 'Seleccione un perfil']+$perfiles, null, ['required','data-error'=>'No ha seleccionado un perfil','class' => 'form-control'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>