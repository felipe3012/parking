<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Http\Requests;
use Session;
use Redirect;
use Parking\Tickets;

class TicketsController extends Controller
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
        $this->ticket = tickets::find($route->getParameter('tickets'));
        $this->notFound($this->ticket);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tickets = tickets::all();
        return view('tickets.admin', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tickets.new');
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
            Tickets::create($request->all());
            Session::flash('message-success', 'ticket ' . $request['nombre'] . ' creada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al crear ticket' . $request['nombre']);
        }
        return $this->retorno("tickets");
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
        $ticket        = $this->ticket;
        return view('tickets.edit', compact('ticket'));
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
        $this->ticket->fill($request->all());
        try {
            $this->ticket->save();
            Session::flash('message-success', 'ticket ' . $request['nombre'] . ' actualizada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al actualizar ticket' . $request['nombre']);
        }
        return $this->retorno("tickets");
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
            Tickets::destroy($id);
            Session::flash('message-success', 'ticket ' . $nombre . ' eliminada correctamente');
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al eliminar ticket' . $nombre);
        }
        return $this->retorno("tickets");
    }
}
