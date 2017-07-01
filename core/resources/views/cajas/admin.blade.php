@extends('layouts.base')
@section('title','caja | Administrar')
@section('name')
<i data-icon=")" class="linea-icon linea-basic fa-fw"></i> caja
@stop
@section('breadcrumb','<li>caja</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de cajas <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('cajas.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i></button>',[],['class'=>'iframe','title'=>'Nueva empresa','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Carros</th>
                    <th>Motos</th>
                    <th>Estacionamientos carros</th>
                    <th>Estacionamientos motos</th>
                    <th>Base</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cajas as $data)
                <tr>
                    <td>{{$data->nit}}</td>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->contacto}}</td>
                     <td>{{$data->telefono}}</td>
                     <td>{{$data->contacto}}</td>
                     <td>{{$data->telefono}}</td>
                    <td>
  {!!Html::decode(link_to_route('cajas.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar empresa','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('empresadel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar empresa','data'=>'empresa: '.$data->nombre]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
