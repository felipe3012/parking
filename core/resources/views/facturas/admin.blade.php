@extends('layouts.base')
@section('title','Facturas | Administrar')
@section('name',' <i class="fa fa-building-o"></i> Facturas')
@section('breadcrumb','<li>Facturas</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de Facturas <div class="box-tools pull-right form-inline hidden-xs">
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Servicio</th>
                    <th>Vehiculo</th>
                    <th>Tiempo</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($facturas as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->servicio}}</td>
                    <td>{{$data->tipo_vehiculo}}</td>
                     <td>{{$data->tiempo}}</td>
                     <td>{{$data->total}}</td>
                    <td>
  {!!Html::decode(link_to_route('facturas.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar factura','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('facturasdel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id],['class'=>'msgbox','title'=>'Eliminar factura','data'=>'Factura No. : '.$data->id]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
