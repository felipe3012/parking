<?php

namespace Parking\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
        $permisos  = explode(",", Auth::user()->permisos());
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
