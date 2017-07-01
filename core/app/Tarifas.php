<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Tarifas extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tarifas';

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
      protected $fillable = ['id', 'nombre','valor','id_tipo_vehiculo','usuario'];
}
