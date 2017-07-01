@extends('layouts.base')
@section('title','servicios | Administrar')
@section('name',' <i class="ti-briefcase fa-fw"></i> servicios')
@section('breadcrumb','<li>servicios</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de servicios <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('servicios.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nueva</button>',[],['class'=>'iframe','title'=>'Nueva servicio','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Servicio</th>
                    <th>Descripción</th>
                    <th>valor</th>
                    <th>Tipo Vehiculo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($servicios as $data)
                <tr>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->descripcion}}</td>
                    <td>$ {{$data->valor}}</td>
                     <td>{{$data->id_tipo_vehiculo}}</td>
                    <td>
  {!!Html::decode(link_to_route('servicios.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar servicio','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('serviciodel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar servicio','data'=>'servicio: '.$data->nombre]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
