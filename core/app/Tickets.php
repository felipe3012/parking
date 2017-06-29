<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets';

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
      protected $fillable = ['id', 'placa','fecha_fin','servicio','estado', 'id_tipo_vehiculo'];
}
