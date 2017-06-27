@extends('layouts.base')
@section('title','Inicio')
@section('name','Inicio')
@section('breadcrumb','')
@section('content')
@include('inc.analytics')
<div class="row">
        @include('tickets.new')
        <div class="col-md-6">
        <div class="col-md-12">
        <div class="col-md-3"></div>
          <div class="col-md-4">
    <div  style="background-color:#ffc60b;padding: 10px;text-align: center; -moz-border-radius: 10px;-webkit-border-radius: 10px;width: 250px;">
  <label id="placatext" style="border: black 3px solid;padding: 10px;font-size: 45px;color: black;text-transform: uppercase; -moz-border-radius: 10px;-webkit-border-radius: 10px;">---:---</label>
  </div><br/>
  </div>
        </div>
        <div class="col-md-12">
          @include('facturas.new')
        </div>
@stop
@section('script')
<script type="text/javascript">
  $(document).on('change', '#placa', function(event) {
    var caja = $(this).val();
    $("#placatext").html(caja);
    if($(this).val()==""){
         $("#placatext").html("---:---");
    }
  });
</script>
@stop
