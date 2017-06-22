@extends('layouts.base')
@section('title','Funcionalidades | Administrar')
@section('name',' <i class="fa fa-users"></i> Funcionalidades')
@section('breadcum','<li>Funcionalidades</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de funcionalidades <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('funcionalidades.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i></button>',[],['class'=>'iframe','title'=>'Nueva funcionalidad','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Icono</th>
                    <th>Padre</th>
                    <th>Peso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($funcionalidades as $data)
                <tr>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->referencia}}</td>
                    <td><i class="{{$data->icono}}"></i></td>
                    <td>{{$data->padre}}</td>
                     <td>{{$data->peso}}</td>
                    <td>
  {!!Html::decode(link_to_route('funcionalidades.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar funcionalidad','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('funcionalidad','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar funcionalidad','data'=>'Funcionalidad: '.$data->nombre]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>        
        </div>
      </div>
@stop