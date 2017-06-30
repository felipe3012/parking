<div class="item form-group">
{!!Html::decode(Form::label('', '', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::radio('tipo', 1, '', ['required','class'=>'tipo']) !!} Convenio
        {!! Form::radio('tipo', 2, '', ['required','class'=>'tipo']) !!} Mensualidad
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div id="convenio">
<div class="item form-group">
    {!!Html::decode(Form::label('numero_carros', '# Carros<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::number('numero_carros', null,['id'=>'carros','required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('numero_motos', '# Motos<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::number('numero_motos', null,['id'=>'motos','required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('id_em_us', 'Empresas<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('id_em_us', [""=>"Seleccione una empresa"]+$empresas, null, ['id'=>'nit','required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>
</div>

<div id="mensualidad">
<div class="item form-group">
    {!!Html::decode(Form::label('id_em_us', 'Documento<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('id_em_us', null,['id'=>'documento','required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('nombre', 'Nombre<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('nombre', null,['id'=>'nombre','required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('telefono', 'Telefono<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('telefono', null,['id'=>'telefono','required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('placa', 'Placa<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('placa', null,['id'=>'placa','required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('id_tipo_vehiculo', 'Tipo Vehiculo<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('', [""=>"Seleccione un tipo de vehiculo"]+$tipovehiculos, null, ['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12']) !!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

</div>

<div class="item form-group">
    {!!Html::decode(Form::label('fecha_inicio', 'Fecha Inicio<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('fecha_inicio', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('fecha_fin', 'Fecha Fin<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('fecha_fin', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>

<div class="item form-group">
    {!!Html::decode(Form::label('valor', 'Valor<span class="required"> * </span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']))!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!!Form::text('valor', null,['required','data-error'=>'Campo requerido', 'class'=>'form-control col-md-7 col-xs-12'])!!}
        <div class="help-block with-errors">
        </div>
    </div>
</div>