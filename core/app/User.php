<?php

namespace Parking;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Parking\Permisos;
use Auth;

class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'id_perfil', 'usuario'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

/**
 * [setPasswordAttribute description]
 * @param [type] $param [description]
 */
    public function setPasswordAttribute($param)
    {
        if (!empty($param)) {
            $this->attributes['password'] = \Hash::make($param);
        }
    }

/**
 * [perfil description]
 * @return [type] [description]
 */
    public static function  perfil()
    {
        $nombre = Perfiles::select('nombre')->where('id', '=', $this->attributes['id_perfil'])->get();
        return $nombre[0]->nombre;
    }

/**
 * [permisos description]
 * @return [type] [description]
 */
    public static function  permisos(){
         $permisos       = [];
        $funcionalidades = Permisos::where('id_perfil', Auth::user()->id_perfil)->get();
        if (count($funcionalidades) > 0) {
            foreach ($funcionalidades as $value) {
                array_push($permisos, $value->id_funcionalidad);
            }
        }
        return $permisos;
    }

}
