@extends('layouts.form')
@section('content')
{!!Form::model($funcionalidad,['route'=>['funcionalidades.update',$funcionalidad->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_funcionalidades')
<br/>
<div align="center" class="form-group">
    {!!Form::submit('Actualizar',['class'=>'btn btn-sm btn-primary','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Url')['public']}}funcionalidades'" type="button">
        Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop