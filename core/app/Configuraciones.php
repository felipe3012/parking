<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Configuraciones extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configuraciones';

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
    protected $fillable = ['id', 'nombre', 'logo', 'direccion', 'telefono', 'stock_carros', 'stock_motos', 'tiempo_gracia', 'nit'];
}
 