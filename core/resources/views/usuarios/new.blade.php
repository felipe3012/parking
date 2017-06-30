@extends('layouts.form')
@section('content')
{!!Form::open(['route'=>'usuarios.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
{!! Form::hidden('estado',1, []) !!}
@include('forms.form_usuarios')
{!! Form::hidden('usuario', Auth::user()->id, []) !!}
<br/>
<div align="center" class="form-group col-md-12">
    {!!Form::submit('Guardar',['class'=>'btn btn-sm btn-success','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}usuarios'" type="button">
         <i class="fa fa-close"></i> Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop
