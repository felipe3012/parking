<div class="col-md-6">
          <div class="white-box">
            <h3 class="box-title m-b-0" style="text-align: center;">Ingreso</h3>
            <div class="row">
              <div class="col-sm-12 col-xs-12">
              {!!Form::open(['route'=>'tickets.store','method'=>'POST','name'=>'tickets','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
         {!! Form::hidden('cajero', Auth::user()->id, []) !!}
                  <div class="form-group">
                    <label for="exampleInputuname">Placa</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-flickr"></i></div>
                     {!! Form::text('placa', null, ['data-error'=>'Campo requerido','required','onfocus','class'=>"form-control",'id'=>"placa",'autocomplete'=>'off']) !!}
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipo de vehiculo </label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-car"></i></div>
                      {!! Form::select('id_tipo_vehiculo', []+$tipovehiculos, 2, ['data-error'=>'Campo requerido','required','class'=>'form-control']) !!}
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>               

                  <div class="form-group">
                    <label for="exampleInputEmail1">Servicio</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-shopping-cart"></i></div>
                      {!! Form::select('servicio', $servicios, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Cortesia </label>
                    <div class="input-group">
                    {!! Form::radio('cortesia', 0, true, []) !!} Ninguna
                     @foreach(config('domains.Cortesias') as  $key => $data)
                         {!! Form::radio('cortesia', $key, null, []) !!} {{$data}}
                       @endforeach
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>

                  {!!Form::submit('Registrar',['class'=>'btn btn-success','id'=>'send'])!!}
              
{!!Form::close()!!} 

              </div>
            </div>
          </div>
        </div>