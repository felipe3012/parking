<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
       //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes';

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
    protected $fillable = ['id','documento','nombre','telefono'];
}

