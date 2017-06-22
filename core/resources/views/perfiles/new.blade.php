@extends('layouts.form')
@section('content')
{!!Form::open(['route'=>'perfiles.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_perfiles')
<br/>
<div align="center" class="form-group col-md-12">
    {!!Form::submit('Guardar',['class'=>'btn btn-sm btn-success','id'=>'send'])!!}
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}perfiles'" type="button">
        Cancelar
    </button>
    <button class="d"></button>
</div>
{!!Form::close()!!}
@stop
@section('script')
<script type="text/javascript">
    $(function () {
        $('#jstree').jstree({'plugins':["wholerow","checkbox"], 'core' : {
            'data' : [<?php echo $funcionalidades; ?>]
                                                                         }});
                           });

    $('.d').click(function(e, data){
    	var data = $("#jstree").jstree("get_checked",null,true);
    });
</script>
@stop