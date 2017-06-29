<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;

use Parking\Http\Requests;
use Parking\Http\Controllers\Controller;
use Session;
use Redirect;
use Parking\Tickets;
use DB;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function facturanew($id)
    {

        $ticket = Tickets::select(DB::raw("tickets.id as id, placa, servicios.nombre AS servicio, tipo_vehiculos.nombre AS vehiculo, to_char(tickets.created_at, 'HH12:MI:SS') AS hora "))->join('servicios' , 'servicios.id' ,'=', 'tickets.servicio')->join('tipo_vehiculos', 'tipo_vehiculos.id', '=', 'servicios.id_tipo_vehiculo')->whereRaw(" tickets.id = (select lpad($id::text, 10))::int ")->groupBy()->get();

       
        return view('facturas.generada',compact('ticket'));
    }
} 
