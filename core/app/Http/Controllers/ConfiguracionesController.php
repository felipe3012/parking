<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Configuraciones;
use Session;

class ConfiguracionesController extends Controller
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
        $this->configuracion = Configuraciones::find($route->getParameter('configuraciones'));
        $this->notFound($this->configuracion);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $configuraciones = Configuraciones::where('id', 1)->get();
        return view('configuraciones.admin', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('configuraciones.new');
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
            Configuraciones::create($request->all());
            Session::flash('message-success', 'Configuracion ' . $request['nombre'] . ' guardada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al guardar configuracion' . $request['nombre']);
        }
        return $this->retorno("configuraciones");
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
        $configuracion = $this->configuracion;
        return view('configuraciones.edit', compact('configuracion'));
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
        $this->configuracion->fill($request->all());
        if ($this->configuracion->save()) {
            Session::flash('message-success', 'Configuracion ' . $request['nombre'] . ' actualizada correctamente');
        } else {
            Session::flash('message-error', 'Error al actualizar configuración' . $request['nombre']);
        }
        return $this->retorno("configuraciones");
    }
}
