@extends('layouts.base')
@section('title','convenios | Administrar')
@section('name',' <i class="fa fa-building-o"></i> convenios')
@section('breadcum','<li>convenios</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de convenios <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('convenios.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nuevo</button>',[],['class'=>'iframe','title'=>'Nuevo convenio','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Empresa/usuario</th>
                    <th>Tipo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($convenios as $data)
                <tr>
                    <td>{{$data->id_em_us}}</td>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->telefono}}</td>
                    <td>
  {!!Html::decode(link_to_route('convenios.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar convenio','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('conveniodel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar convenio','data'=>'convenio: '.$data->nombre]))!!}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
