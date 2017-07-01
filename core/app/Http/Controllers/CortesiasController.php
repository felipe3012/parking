<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Http\Requests;
use Parking\Http\Controllers\Controller;
use Session;
use Auth;
use Parking\Cortesias;

class CortesiasController extends Controller
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
        $this->cortesia = Cortesias::find($route->getParameter('cortesias'));
        $this->notFound($this->cortesia);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cortesias = Cortesias::all(); 
        return view('cortesias.admin', compact('cortesias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cortesias.new');
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
            Cortesias::create($request->all());
            Session::flash('message-success', 'Cortesia ' . $request['name'] . ' creada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al crear cortesia: ' . $request['name']);
        }
        return $this->retorno("cortesias");
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
        $cortesia = $this->cortesia;
        return view('cortesias.edit', compact('cortesia')); 
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
        $this->cortesia->fill($request->all());
        try {
            $this->cortesia->save();
            Session::flash('message-success', 'cortesia ' . $request['name'] . ' actualizada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al actualizar cortesia' . $request['name']);
        }
        return $this->retorno("cortesias");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $name)
    {
        //
        try {
            Cortesias::destroy($id);
            Session::flash('message-success', 'cortesia ' . $name . ' eliminada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al eliminar cortesia' . $name);
        }
        return $this->retorno("cortesias");
    }
}
