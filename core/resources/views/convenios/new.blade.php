@extends('layouts.form')
@section('content')
{!!Form::open(['route'=>'convenios.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_convenios')
<br/>
<div align="center" class="form-group col-md-12">
    {!!Form::submit('Guardar',['class'=>'btn btn-sm btn-success','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}convenios'" type="button">
         <i class="fa fa-close"></i> Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop
@section('script')
<script>
    $('#convenio').hide();
    $('#mensualidad').hide();
     $(document).ready(function() {
     $('.tipo').change(function() {
     	console.log($(this).val());
         if ($(this).prop('checked')) {
             if ($(this).val() == 1) {
              $('#convenio').show();
              $('#mensualidad').hide();

              $('#carros').attr('required','required');
              $('#motos').attr('required','required');
              $('#nit').attr('required','required');

              $('#nombre').removeAttr('required');
              $('#documento').removeAttr('required');
              $('#placa').removeAttr('required');
              $('#tipo').removeAttr('required');
              $('#telefono').removeAttr('required');

               $('#nombre').val("");
              $('#documento').val("");
              $('#placa').val("");
              $('#tipo').val("");
              $('#telefono').val("");

             }if ($(this).val() == 2) {
              $('#mensualidad').show();
              $('#convenio').hide();

              $('#carros').removeAttr('required');
              $('#motos').removeAttr('required');
              $('#nit').removeAttr('required');

              $('#nombre').attr('required','required');
              $('#documento').attr('required','required');
              $('#placa').attr('required','required');
              $('#tipo').attr('required','required');
              $('#telefono').attr('required','required');

              $('#carros').val("");
              $('#motos').val("");
              $('#nit').val("");
             }
         }
        });
    });
</script>
@stop
