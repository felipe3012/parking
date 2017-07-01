<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Clientes_Empresas_Convenios extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes__empresas__convenios';

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
    protected $fillable = [ 'id','id_convenio','id_empresa', 'usuario'];
}
