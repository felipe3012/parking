<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Servicios;
use Parking\TipoVehiculos;
use Session;

class ServiciosController extends Controller
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
        $this->servicio = Servicios::find($route->getParameter('servicios'));
        $this->notFound($this->servicio);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicios = Servicios::select('servicios.id','servicios.descripcion','servicios.valor','servicios.nombre','tipo_vehiculos.nombre as id_tipo_vehiculo')->join('tipo_vehiculos','tipo_vehiculos.id','=','servicios.id_tipo_vehiculo')->get();
        return view('servicios.admin', compact('servicios'));
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
        return view('servicios.new', compact('tipovehiculos'));
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
            Servicios::create($request->all());
            Session::flash('message-success', 'servicio ' . $request['nombre'] . ' creada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al crear servicio' . $request['nombre']);
        }
        return $this->retorno("servicios");
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
        $servicio      = $this->servicio;
        $tipovehiculos = TipoVehiculos::lists('nombre', 'id')->toArray();
        return view('servicios.edit', compact('servicio', 'tipovehiculos'));
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
        $this->servicio->fill($request->all());
        try {
            $this->servicio->save();
            Session::flash('message-success', 'servicio ' . $request['nombre'] . ' actualizada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al actualizar servicio' . $request['nombre']);
        }
        return $this->retorno("servicios");
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
            Servicios::destroy($id);
            Session::flash('message-success', 'servicio ' . $nombre . ' eliminada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al eliminar servicio' . $nombre);
        }
        return $this->retorno("servicios");
    }
}
