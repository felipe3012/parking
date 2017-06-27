<div class="col-md-6">
          <div class="white-box">
            <h3 class="box-title m-b-0" style="text-align: center;">Ingreso</h3>
            <div class="row">
              <div class="col-sm-12 col-xs-12">
              {!!Form::open(['route'=>'tickets.store','method'=>'POST','name'=>'tickets','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal form-label-left'])!!}
        
                  <div class="form-group">
                    <label for="exampleInputuname">Placa</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-flickr"></i></div>
                     {!! Form::text('placa', null, ['data-error'=>'Campo requerido','required','onfocus','class'=>"form-control",'id'=>"placa"]) !!}
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipo de vehiculo </label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-car"></i></div>
                      {!! Form::select('', []+$tipovehiculos, 1, ['data-error'=>'Campo requerido','required','class'=>'form-control']) !!}
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Servicio</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-shopping-cart"></i></div>
                      {!! Form::select('', [""=>"Ninguno"]+$servicios, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="help-block with-errors"></div>
                  </div>

                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Facturar</button>
              
{!!Form::close()!!}

              </div>
            </div>
          </div>
        </div>