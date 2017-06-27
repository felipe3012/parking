@extends('layouts.login')
@section('title', 'Bienvenidos | ParkingLot')
@section('content')  
<section id="wrapper" class="login-register">
  <div class="login-box">
    <div class="white-box">
    @include('forms.form_login')
    </div>
  </div>
</section>
@endsection
