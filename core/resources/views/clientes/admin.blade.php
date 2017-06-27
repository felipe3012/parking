@extends('layouts.base')
@section('title','Clientes | Administrar')
@section('name',' <i class="fa fa-building-o"></i> Clientes')
@section('breadcum','<li>Clientes</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de clientes <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('clientes.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> NUevo</button>',[],['class'=>'iframe','title'=>'Nuevo cliente','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nit</th>
                    <th>Razón social</th>
                    <th>contacto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clientes as $data)
                <tr>
                    <td>{{$data->documento}}</td>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->telefono}}</td>
                    <td>
  {!!Html::decode(link_to_route('clientes.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar cliente','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('clientedel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar cliente','data'=>'cliente: '.$data->nombre]))!!}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
