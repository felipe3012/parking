@extends('layouts.base')
@section('title','tarifas | Administrar')
@section('name',' <i data-icon="/" class="linea-icon linea-basic fa-fw"></i> tarifas')
@section('breadcrumb','<li>tarifas</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de tarifas <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('tarifas.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nueva</button>',[],['class'=>'iframe','title'=>'Nueva tarifa','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered centrado datatable">
            <thead>
                <tr>
                 <th>Tipo Vehiculo</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tarifas as $data)
                <tr>
                     <td>{{$data->id_tipo_vehiculo}}</td>
                      <td>$ {{$data->valor}}</td>
                    <td>
  {!!Html::decode(link_to_route('tarifas.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar tarifa','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('tarifadel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar tarifa','data'=>'tarifa: '.$data->id_tipo_vehiculo.' valor:'.$data->valor]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
