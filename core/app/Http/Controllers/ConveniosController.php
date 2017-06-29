<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Convenios;
use Parking\Empresas;
use Parking\Http\Controllers\Controller;
use Parking\TipoVehiculos;
use Session;

class ConveniosController extends Controller
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
        $this->convenio = Convenios::find($route->getParameter('convenios'));
        $this->notFound($this->convenio);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $convenios = Convenios::all();
        return view('convenios.admin', compact('convenios'));
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
        $empresas      = Empresas::lists('nombre', 'nit')->toArray();
        return view('convenios.new', compact('tipovehiculos', 'empresas'));
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
        $request['documento']= $request['id_em_us'];
        try {
            Convenios::create($request->all());
            if ($request['tipo'] == 1) {
            } else {
               $cliente = Clientes::create($request->all());
               Vehiculos::create(['placa'=>$request['placa'],'id_cliente'=>$cliente->id]);
            }
           
            Session::flash('message-success', 'convenio ' . $request['nombre'] . ' creada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al crear convenio' . $request['nombre']);
        }
        return $this->retorno("convenios");
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
        $convenio      = $this->convenio;
        $tipovehiculos = TipoVehiculos::lists('nombre', 'id')->toArray();
        $empresas      = Empresas::lists('nombre', 'nit')->toArray();
        return view('convenios.edit', compact('convenio', 'tipovehiculos', 'empresas'));
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
        $this->convenio->fill($request->all());
        try {
            $this->convenio->save();
            Session::flash('message-success', 'convenio ' . $request['nombre'] . ' actualizada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al actualizar convenio' . $request['nombre']);
        }
        return $this->retorno("convenios");
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
            Convenios::destroy($id);
            Session::flash('message-success', 'convenio ' . $nombre . ' eliminada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al eliminar convenio' . $nombre);
        }
        return $this->retorno("convenios");
    }
}
