<?php

namespace Parking;

use Illuminate\Database\Eloquent\Model;

class Cortesias extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cortesias';

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
    protected $fillable = ['id', 'name', 'tiempo_cortesia','usuario'];
}
