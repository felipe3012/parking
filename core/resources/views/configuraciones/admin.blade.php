@extends('layouts.base')
@section('title','Configurar | Administrar')
@section('name',' <i class="fa fa-users"></i> Configurar')
@section('breadcum','<li>Configurar</li><li class="active"> Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Datos de la finca </h3>
            @if(count($configuraciones)>0)
            <?php $configuraciones = $configuraciones[0];?>
              @include('configuraciones.edit')
           @else  
              @include('configuraciones.new')
           @endif
          </div>        
        </div>
      </div>
@stop