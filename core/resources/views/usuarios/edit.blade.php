@extends('layouts.form')
@section('content')
{!!Form::model($usuarios,['route'=>['usuarios.update',$usuarios->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_usuarios')
<br/>
<div align="center" class="form-group">
    {!!Form::submit('Actualizar',['class'=>'btn btn-sm btn-primary','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}usuarios'" type="button">
        Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop
