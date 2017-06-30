<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facturas';

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
      protected $fillable = ['id', 'servicio','valor_servicio','tipo_vehiculo','tiempo_gracias','tiempo_descuento','tiempo','tarifa','subtotal','iva','total'];
}
