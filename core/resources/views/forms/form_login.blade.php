 {!! Form::open(['route'=>'auth/login','method'=>'post','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>"form-horizontal form-material", 'id'=>"loginform" ]) !!}
   <div style="text-align: center;">{!!Html::image('theme/plugins/images/logos.png',null,['width'=>'200'])!!}
        <h3 class="box-title m-b-20">Ingreso para funcionarios</h3></div>
        <div class="form-group ">
          <div class="col-xs-12">
          {!! Form::text('email', null, ['class'=>"form-control",'required','placeholder'=>"Usuario"]) !!}

          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
          {!! Form::password('password', ['class'=>"form-control",'required','placeholder'=>"Contraseña"]) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
            {!! Form::checkbox('remenber', null, false, ['id'=>"checkbox-signup"]) !!}
              <label for="checkbox-signup"> Recordarme </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Olvido su contraseña?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-sm btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Iniciar</button>
          </div>
        </div>
       {!! Form::close() !!}
         {!! Form::open(['url'=>'password/email','method'=>'post','id'=>"recoverform",'class'=>'form-horizontal']) !!}
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recuperar Contraseña</h3>
            <p class="text-muted">Ingresa tu email y te enviaremos las instrucciones </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
           {!! Form::email('email', null, ['required','class'=>'form-control','placeholder'=>'Email']) !!}
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
           <button class="btn btn-sm btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Restablecer</button>
          </div>
        </div>
  {!! Form::close() !!}