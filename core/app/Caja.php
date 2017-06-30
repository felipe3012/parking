<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    //
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'caja';

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
    protected $fillable = ['id', 'no_carros_ingresaron', 'no_motos_ingresaron', 'par_carros_dispo', 'par_motos_dispo', 'estado'];
}
