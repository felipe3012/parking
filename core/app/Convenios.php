<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
      //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'convenios';

  /**
   *
   *
   * @var string
   */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id','fecha_inicio','fecha_fin','tipo_convenio','id_empresa_cliente','numero_carros','numero_motos', 'usuario'];


    
}
