<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Http\Requests;
use Session;
use Redirect;
use Auth;
use Parking\TipoVehiculos;

class TipoVehiculosController extends Controller
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
        $this->tipovehiculo = TipoVehiculos::find($route->getParameter('tipovehiculos'));
        $this->notFound($this->tipovehiculo);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipovehiculos = TipoVehiculos::all();
        return view('tipovehiculos.admin', compact('tipovehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipovehiculos.new');
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
            TipoVehiculos::create($request->all());
            Session::flash('message-success', 'tipovehiculo ' . $request['nombre'] . ' creada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al crear tipovehiculo' . $request['nombre']);
        }
        return $this->retorno("tipovehiculos");
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
        $tipovehiculo = $this->tipovehiculo;
        return view('tipovehiculos.edit', compact('tipovehiculo'));
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
        $this->tipovehiculo->fill($request->all());
        try {
            $this->tipovehiculo->save();
            Session::flash('message-success', 'tipovehiculo ' . $request['nombre'] . ' actualizada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al actualizar tipovehiculo' . $request['nombre']);
        }
        return $this->retorno("tipovehiculos");
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
            TipoVehiculos::destroy($id);
            Session::flash('message-success', 'tipovehiculo ' . $nombre . ' eliminada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al eliminar tipovehiculo' . $nombre);
        }
        return $this->retorno("tipovehiculos");
    }
}
