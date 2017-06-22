<?php

namespace Parking\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Funcionalidades;
use Parking\Perfiles;
use Parking\Permisos;
use Session;

class PerfilesController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => []]);
        $this->beforeFilter('@find', ['only' => ['edit', 'update']]);
    }

/**
 * [find description]
 * @param  Route  $route [description]
 * @return [type]        [description]
 */
    public function find(Route $route)
    {
        $this->perfiles = Perfiles::find($route->getParameter('perfiles'));
        $this->notFound($this->perfiles);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $perfiles = Perfiles::select(DB::raw("count(id_perfil) as nuser, perfiles.id, perfiles.nombre"))
            ->leftJoin('usuarios', 'usuarios.id_perfil', '=', 'perfiles.id')
            ->groupby('id_perfil', 'perfiles.id', 'perfiles.nombre')->get();
        return view('perfiles.admin', compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $funcionalidades = $this->build_funcionalidades([]);
        return view('perfiles.new', compact('funcionalidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $permisos = [];
        if (!empty($request['permisos'])) {
            $permisos = explode(",", $request['permisos']);
        }
        try {
            $perfil = Perfiles::create($request->all());
            foreach ($permisos as $value) {
                Permisos::create(['id_perfil' => $perfil->id, 'id_funcionalidad' => $value]);
            }
            Session::flash('message-success', 'Perfil ' . $request['nombre'] . ' creado correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al crear perfil' . $request['nombre']);
        }

        return $this->retorno("perfiles");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $perfil          = $this->perfiles;
        $permisos        = Permisos::where('id_perfil',$perfil->id)->get();
        $funcionalidades = $this->build_funcionalidades($permisos);
        return view('perfiles.edit', compact('perfil', 'funcionalidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $permisos = [];
        if (!empty($request['permisos'])) {
            $permisos = explode(",", $request['permisos']);
        }
        $this->perfiles->fill($request->all());
        DB::table('permisos')->where('id_perfil', $this->perfiles->id)->delete();
        try {
            if ($this->perfiles->save()) {
                foreach ($permisos as $value) {
                    Permisos::create(['id_perfil' => $this->perfiles->id, 'id_funcionalidad' => $value]);
                }
                Session::flash('message-success', 'Perfil ' . $request['nombre'] . ' actualizado correctamente');
            }
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al actualizar perfil' . $request['nombre']);
        }

        return $this->retorno("perfiles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $nombre)
    {
        //
        try {
            Perfiles::destroy($id);
            DB::table('permisos')->where('id_perfil', $id)->delete();
            Session::flash('message-success', 'Perfil ' . $nombre . ' eliminado correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al eliminar perfil' . $nombre);
        }
        return $this->retorno("perfiles");
    }

    public function build_funcionalidades($permisos)
    {
        $permiso = [];
        $funcion   = '';
        $funciones = Funcionalidades::all();
        if (count($permisos) > 0) {
            foreach ($permisos as $values) {
                array_push($permiso, $values->id_funcionalidad);
            }
        }
        foreach ($funciones as $value) {
            $subfuncion = $value->padre;
            $boolean    = "false";
            if (in_array($value->id, $permiso)) {
                $boolean = "true";
            }
            if ($subfuncion == 0) {
                $subfuncion = '#';
            }
            $funcion .= '{ "id" : "' . $value->id . '", "parent" : "' . $subfuncion . '", "text" : "' . $value->nombre . '", "icon": "' . $value->icono . '","state": {"selected": ' . $boolean . '}},';
        }
        return $funcion;
    }

}
