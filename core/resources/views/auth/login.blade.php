@extends('layouts.login')
@section('title', 'Login')
@section('content')  
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
    {!! Form::open(['route'=>'login','method'=>'post','name'=>'frm','id'=>'loginform','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-material']) !!} 
        <a href="javascript:void(0)" class="text-center db"><img src="theme/plugins/images/crown.png" alt="Home" /><br/><img src="theme/plugins/images/logotext.png" alt="Home" /></a>  
        
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            {!! Form::text('email', null, ['class'=>'form-control', 'required', 'placeholder'=>'Correo electronico']) !!}
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
          {!! Form::password('password', ['class'=>'form-control', 'required', 'placeholder'=>'Contraseña']) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Recuerdame</label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> ¿Olvidaste tu contraseña?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingreso Funcionario</button>
          </div>
        </div>
      {!! Form::close() !!}
      <form class="form-horizontal" id="recoverform" action="index.html">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recuperar Contraseña</h3>
            <p class="text-muted">Introduzca su correo electrónico y se le enviara un correo con los pasos a seguir</p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
          {!! Form::email('email', null, ['class'=>'form-control', 'required', 'placeholder'=>'Correo electronico']) !!}
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Restablecer</button>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection
