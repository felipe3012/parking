@extends('layouts.base')
@section('title','Configurar | Administrar')
@section('name',' <i data-icon="P" class="linea-icon linea-basic fa-fw"></i> Configurar')
@section('breadcrumb','<li>Configurar</li><li class="active"> Administrar</li>')
@section('content')
  <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3 class="box-title">Datos del parqueadero </h3>
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