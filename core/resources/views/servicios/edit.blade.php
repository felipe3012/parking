@extends('layouts.form')
@section('content')
{!!Form::model($servicio,['route'=>['servicios.update',$servicio->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_servicios')
<br/>
<div align="center" class="form-group">
    {!!Form::submit('Actualizar',['class'=>'btn btn-sm btn-primary','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}servicios'" type="button">
        <i class="fa fa-close"></i> Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop
