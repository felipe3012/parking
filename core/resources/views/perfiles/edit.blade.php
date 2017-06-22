@extends('layouts.form')
@section('content')
{!!Form::model($perfil,['route'=>['perfiles.update',$perfil->id],'method'=>'PUT','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_perfiles')
<div class="col-md-12" align="center">
<table class="table-condensed table-bordered" width="50%">
<tr>
    <td>
        <div class="demo" id="jstree" style="text-align: center;">
        </div>
    </td>
</tr>
</table>
</div>
<br/>
<div align="center" class="form-group">
    {!!Form::submit('Actualizar',['class'=>'btn btn-sm btn-primary','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}perfiles'" type="button">
        Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop
