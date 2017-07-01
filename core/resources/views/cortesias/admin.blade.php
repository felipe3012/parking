@extends('layouts.base')
@section('title','Cortesias | Administrar')
@section('name',' <i class="icon-badge fa-fw"></i> Cortesias')
@section('breadcrumb','<li>Cortesias</li><li class="active">Administrar</li>')
@section('content') 
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Lista de cortesias <div class="box-tools pull-right form-inline hidden-xs">
            {!!Html::decode(link_to_route('cortesias.create','<button type="button" class="btn btn-sm btn-warning "><i class="fa fa-plus"></i> Nueva</button>',[],['class'=>'iframe','title'=>'Nueva cortesia','data-icon'=>'fa fa-plus']))!!}
            </div> </h3>
             <table class="table table-striped table-hover table-bordered center datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tiempo de la cortesia</th>
                    <th>Acciones</th>
                </tr>
            </thead> 
            <tbody>
            @foreach($cortesias as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->tiempo_cortesia}}</td>
                    <td>
                      {!!Html::decode(link_to_route('cortesias.edit','<button type="button" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></button>',[$data->id],['class'=>'iframe','title'=>'Editar cortesia','data-icon'=>'fa fa-edit']))!!}
                      {!!Html::decode(link_to_route('cortesiadel','<button type="button" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></button>',[$data->id, $data->name],['class'=>'msgbox','title'=>'Eliminar cortesia','data'=>'Cortesia: '.$data->name]))!!}
                    </td>
                </tr>
            @endforeach   
            </tbody>
            </table>
          </div>
        </div>
      </div>
@stop
