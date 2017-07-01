<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Tarifas;
use Parking\TipoVehiculos;
use Session;
use Auth;

class TarifasController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index','create','edit','show','update','destroy']]);
        $this->beforeFilter('@find', ['only' => ['edit', 'update']]);
    }

/**
 * [find description]
 * @param  Route  $route [description]
 * @return [type]        [description]
 */
    public function find(Route $route)
    {
        $this->tarifa = Tarifas::find($route->getParameter('tarifas'));
        $this->notFound($this->tarifa);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tarifas = Tarifas::select('tarifas.id','tarifas.valor','tipo_vehiculos.nombre as id_tipo_vehiculo')->join('tipo_vehiculos','tipo_vehiculos.id','=','tarifas.id_tipo_vehiculo')->get();
        return view('tarifas.admin', compact('tarifas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipovehiculos = TipoVehiculos::lists('nombre', 'id')->toArray();
        return view('tarifas.new', compact('tipovehiculos'));
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
            Tarifas::create($request->all());
            Session::flash('message-success', 'tarifa ' . $request['nombre'] . ' creada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al crear tarifa' . $request['nombre']);
        }
        return $this->retorno("tarifas");
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
        $tarifa        = $this->tarifa;
        $tipovehiculos = TipoVehiculos::lists('nombre', 'id')->toArray();
        return view('tarifas.edit', compact('tarifa', 'tipovehiculos'));
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
        $this->tarifa->fill($request->all());
        try {
            $this->tarifa->save();
            Session::flash('message-success', 'tarifa ' . $request['nombre'] . ' actualizada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al actualizar tarifa' . $request['nombre']);
        }
        return $this->retorno("tarifas");
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
            Tarifas::destroy($id);
            Session::flash('message-success', 'tarifa ' . $nombre . ' eliminada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al eliminar tarifa' . $nombre);
        }
        return $this->retorno("tarifas");
    }
}
