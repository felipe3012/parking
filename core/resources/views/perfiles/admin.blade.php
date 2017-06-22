@extends('layouts.base')
@section('title','Perfiles | Administrar')
@section('name',' <i class="fa fa-users"></i> Perfiles')
@section('breadcum','<li>Perfiles</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Listado de perfiles <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('perfiles.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i></button>',[],['class'=>'iframe','title'=>'Nuevo perfil','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>N° Usuarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($perfiles as $data)
                <tr>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->nuser}}</td>
                    <td>
  {!!Html::decode(link_to_route('perfiles.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar perfil','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('perfil','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar perfil','data'=>'Perfil: '.$data->nombre]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>        
        </div>
      </div>
@stop