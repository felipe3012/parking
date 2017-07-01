<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehiculos';

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
      protected $fillable = ['id', 'placa','id_cliente','usuario'];
}
