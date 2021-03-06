@extends('layouts.form')
@section('content')
{!!Form::open(['route'=>'cortesias.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_cortesias')
{!! Form::hidden('usuario', Auth::user()->id, []) !!}
<br/>
<div align="center" class="form-group col-md-12">
    {!!Form::submit('Guardar',['class'=>'btn btn-sm btn-success','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Url')['public']}}cortesias'" type="button">
         <i class="fa fa-close"></i> Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop
