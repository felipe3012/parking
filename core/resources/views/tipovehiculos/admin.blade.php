@extends('layouts.base')
@section('title','Tipo de vehiculos | Administrar')
@section('name',' <i class="fa fa-building-o"></i> Tipo de vehiculos')
@section('breadcum','<li>Tipo de vehiculos</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de tipo de vehiculos <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('tipovehiculos.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> NUevo</button>',[],['class'=>'iframe','title'=>'Nueva tipo de vehiculo','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tipovehiculos as $data)
                <tr>
                    <td>{{$data->nombre}}</td>
                    <td>
  {!!Html::decode(link_to_route('tipovehiculos.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar tipo de vehiculo','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('tipovehiculodel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar tipo de vehiculo','data'=>'tipo de vehiculo: '.$data->nombre]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
