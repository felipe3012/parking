@extends('layouts.form')
@section('content')
{!!Form::open(['route'=>'perfiles.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
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
<div align="center" class="form-group col-md-12">
    <button class="btn btn-sm btn-primary" id="btsubmit" type="submit">
        Guardar
    </button>
    <button class="btn btn-sm btn-warning" onclick="window.parent.location.href = '{{config('domains.Base')[0]}}perfiles'" type="button">
        Cancelar
    </button>
</div>
{!!Form::close()!!}
@stop
@section('script')
<script type="text/javascript">
$(document).on('click', '#btsubmit', function(event) {
    event.preventDefault();
    var data = $("#jstree").jstree("get_checked",null,true);
        console.log(data);
    	$('#permisos').val(data);
    	document.getElementById("btsubmit").value = "Enviando...";
        document.getElementById("btsubmit").disabled = true;
        $("#frm").submit();
});

    $(function () {
        $('#jstree').jstree({'plugins':["wholerow","checkbox"], 'core' : {
            'data' : [<?php echo $funcionalidades; ?> ]
                                                                         }});
                           });
</script>
@stop
