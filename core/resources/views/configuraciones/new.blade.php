
{!!Form::open(['route'=>'configuraciones.store','method'=>'POST','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
@include('forms.form_configuraciones')

<br/>
<div align="center" class="form-group col-md-12">
    {!!Form::submit('Guardar',['class'=>'btn btn-sm btn-success','id'=>'send'])!!}
</div>
<br/>
{!!Form::close()!!}

