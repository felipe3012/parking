@extends('layouts.base')
@section('title','Clientes | Administrar')
@section('name',' <i class="fa fa-car fa-fw"></i> Clientes')
@section('breadcrumb','<li>Clientes</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de clientes <div class="box-tools pull-right form-inline hidden-xs">
            
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
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
