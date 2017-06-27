<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'servicios';

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
    protected $fillable = ['id', 'nombre','descripcion','valor','id_tipo_vehiculo'];
}
