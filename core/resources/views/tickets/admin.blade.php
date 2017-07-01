@extends('layouts.base')
@section('title','servicios | Administrar')
@section('name',' <i class="fa fa-building-o"></i> servicios')
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
                    <th>ID Ticket</th>
                    <th>Placa</th>
                    <th>Servicio</th>
                    <th>Tipo Vehiculo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tickets as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->placa}}</td>
                    <td>{{$data->servicio}}</td>
                     <td>{{$data->vehiculo}}</td>
                     @if($data->estado == 1)
                     <?php $estado='Activo'; ?>
                     @elseif($data->estado == 2)
                     <?php $estado='Inactivo'; ?>
                     @endif
                     <td>{{$estado}}</td>
                    <td> 
  {!!Html::decode(link_to_route('tickets.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar Ticket del Vehiculo','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('ticketsdel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->placa],['class'=>'msgbox','title'=>'Eliminar Ticket del Vehiculo','data'=>'Ticket del vehiculo: '.$data->placa]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
