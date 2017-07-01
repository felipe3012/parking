<div class="white-box">
            <h3 class="box-title m-b-0" style="text-align: center;">Salida</h3>
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                
                  <div class="form-group">
                    <label for="placa">Placa</label>
                    <div class="input-group">
                      {!! Form::text('placa', null, ['class'=>"form-control"]) !!}
                      <div class="input-group-addon"><button class="btn btn-success" title="Buscar" type="submit" ><i class="fa fa-search"></i></button></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="barra">Barra</label>
                    <div class="input-group">
                    {!! Form::text('barra', null, ['autofocus', 'class'=>"form-control barra"]) !!}
                      <div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
