@extends('layouts.form')
@section('content') 
{!!Form::model($ticket,['route'=>['tickets.update',$ticket->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!} 
@include('forms.form_tickets') 
<br/>
<div align="center" class="form-group">
    {!!Form::submit('Actualizar',['class'=>'btn btn-sm btn-primary','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}tickets'" type="button">
        <i class="fa fa-close"></i> Cancelar
    </button>
</div> 
{!!Form::close()!!}
@stop
