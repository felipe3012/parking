<?php

namespace Parking\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Perfiles;
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
        return view('perfiles.new');
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
        try {
            Perfiles::create($request->all());
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
        $perfil = $this->perfiles;
        return view('perfiles.edit', compact('perfil'));
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
        $this->perfiles->fill($request->all());
        if ($this->perfiles->save()) {
            Session::flash('message-success', 'Perfil ' . $request['nombre'] . ' actualizado correctamente');
        } else {
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
            Session::flash('message-success', 'Perfil ' . $nombre . ' eliminado correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al eliminar perfil' . $nombre);
        }
        return $this->retorno("perfiles");
    }
}
