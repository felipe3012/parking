<?php

namespace Parking\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Parking\Permisos;
use Auth;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * [notFound description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function notFound($value)
    {
        if (!$value) {
            abort(404);
        }
    }

/**
 * [security description]
 * @param  [type] $funcion [description]
 * @return [type]          [description]
 */
    public function security($funcion)
    {
        $permisos       = [];
        $funcionalidades = Permisos::where('id_perfil', Auth::user()->id_perfil)->get();
        if (count($funcionalidades) > 0) {
            foreach ($funcionalidades as $value) {
                array_push($permisos, $value->id_funcionalidad);
            }
        }
        $respuesta = "false";
        if (!in_array($funcion, $permisos)) {
            abort(403);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function retorno($ruta)
    {
        //
        $script = "<script>\n";
        $script .= "window.parent.location.href = '" . config('domains.Base')[0] . $ruta . "';\n";
        $script .= "</script>\n";
        echo $script;
    }
}
