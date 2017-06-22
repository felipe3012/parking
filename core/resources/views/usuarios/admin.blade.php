@extends('layouts.base')
@section('title','Usuarios | Administrar')
@section('name',' <i class="fa fa-users"></i> Usuarios')
@section('breadcrumb','<li>Usuarios</li><li class="active">Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de usuarios <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('usuarios.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i></button>',[],['class'=>'iframe','title'=>'Nuevo usuario','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>
  {!!Html::decode(link_to_route('usuarios.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar usuario','data-icon'=>'fa fa-edit']))!!}
  {!!Html::decode(link_to_route('usuariodel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->nombre],['class'=>'msgbox','title'=>'Eliminar perfil','data'=>'Usuario: '.$data->nombre]))!!}
 </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          </div>        
        </div>
      </div>
@stop