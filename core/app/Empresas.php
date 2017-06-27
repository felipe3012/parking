<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
      //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empresas';

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
    protected $fillable = ['id','nit','nombre','direccion','contacto','telefono','correo'];

    
}
