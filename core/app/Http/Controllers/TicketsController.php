<?php

namespace Parking\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Configuraciones;
use Parking\Tickets;
use Session;

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
            $tic = Tickets::where('placa',$request['placa'])->whereNull('fecha_fin')->where('id_tipo_vehiculo',$request['id_tipo_vehiculo'])->get();
            if (count($tic) == 0) {
                $tickets = Tickets::create($request->all());

            Session::flash('message-success', 'ticket creado correctamente');
                $id = $tickets->id;

                $ticket = Tickets::select(DB::raw("tickets.id as id, placa,
                lpad(tickets.id::text, 10, '0'::text) as cod, servicios.nombre AS servicio, tipo_vehiculos.nombre AS vehiculo, to_char(tickets.created_at, 'HH12:MI:SS') AS hora "))->join('servicios', 'servicios.id', '=', 'tickets.servicio')->join('tipo_vehiculos', 'tipo_vehiculos.id', '=', 'servicios.id_tipo_vehiculo')->find($id);

                $empresa = Configuraciones::find(1);
                return View('tickets.imprint', compact('ticket', 'empresa'));
            } else {
              Session::flash('message-error', 'El tickets ya se encuentra registrado');
            }
        } catch (Exception $e) {
            Session::flash('message-error', 'Error al registrar ticket');
        }
        return $this->retorno("");
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
        $ticket = $this->ticket;
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
