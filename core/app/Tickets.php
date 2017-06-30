<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tickets extends Model
{
    use SoftDeletes;
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
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable = ['id', 'placa','fecha_fin','servicio','estado','cortesia', 'id_tipo_vehiculo'];

   
}
