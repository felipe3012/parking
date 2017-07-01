<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Funcionalidades;
use Session;
use Auth;

class FuncionalidadesController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'create', 'edit', 'show', 'update', 'destroy']]);
        $this->beforeFilter('@find', ['only' => ['edit', 'update']]);
    }

/**
 * [find description]
 * @param  Route  $route [description]
 * @return [type]        [description]
 */
    public function find(Route $route)
    {
        $this->funcionalidad = funcionalidades::find($route->getParameter('funcionalidades'));
        $this->notFound($this->funcionalidad);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $funcionalidades = Funcionalidades::all();
        return view('funcionalidades.admin', compact('funcionalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $funcionalidades = Funcionalidades::lists('nombre', 'id')->toArray();
        return view('funcionalidades.new', compact('funcionalidades'));
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
        if (empty($request['padre'])) {
            $request['padre'] = 0;
        }
        try {
            Funcionalidades::create($request->all());
            Session::flash('message-success', 'Funcionalidad ' . $request['nombre'] . ' creado correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al crear funcionalidad' . $request['nombre']);
        }
        return $this->retorno("funcionalidades");
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
        $funcionalidad   = $this->funcionalidad;
        $funcionalidades = Funcionalidades::whereNotIn('id', [$id])->lists('nombre', 'id')->toArray();
        return view('funcionalidades.edit', compact('funcionalidad', 'funcionalidades'));
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
        if (empty($request['padre'])) {
            $request['padre'] = 0;
        }
        $this->funcionalidad->fill($request->all());
        try {
            $this->funcionalidad->save();
            Session::flash('message-success', 'Funcionalidad ' . $request['nombre'] . ' actualizada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al actualizar funcionalidad' . $request['nombre']);
        }
        return $this->retorno("funcionalidades");
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
            Funcionalidades::destroy($id);
            Session::flash('message-success', 'Funcionalidad ' . $nombre . ' eliminada correctamente');
        } catch(Exception $e) {
            Session::flash('message-error', 'Error al eliminar funcionalidad' . $nombre);
        }
        return $this->retorno("funcionalidades");
    }
}
