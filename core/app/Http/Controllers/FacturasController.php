<?php

namespace Parking\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Configuraciones;
use Parking\Facturas;
use Parking\Http\Controllers\Controller;
use Parking\Servicios;
use Parking\Tarifas;
use Parking\Tickets;
use Parking\TipoVehiculos;
use Session;
use Auth;

class FacturasController extends Controller
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
        $this->factura = Facturas::find($route->getParameter('facturas'));
        $this->notFound($this->factura);
    }

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

    public function mensualidad_ticket($placa)
    {

        if ($ticket->cortesia == 1) {

        }
        if ($ticket->cortesia == 2) {

        }
    }

    public function cortesia_ticket($id, $cortesia)
    {
        if ($cortesia == 1) {
            Session::flash('message-error', 'El ticket es una cortesia');
            $this->retorno();
        }
        if ($cortesia == 2) {
            $descuento = Cortesias::select(DB::raw("max(id)"))->get();
            if (count($descuento) > 0) {
                $descuento = $descuento[0]->tiempo_cortesia;
            }
            $this->actualizar_ticket($id);
            $this->facturar_ticket($id, $des_tiempo);
        }
    }

    public function actualizar_ticket($id)
    {
        $ticket = Tickets::find($id);
        $ticket->fill(['fecha_fin' => date("Y-m-d H:i:s")]);
        $ticket->save();
    }

    public function facturar_ticket($id, $des_tiempo)
    {
        $ticket         = Tickets::find($id);
        $empresa        = Configuraciones::find(1);
        $valor_servicio = Servicios::where('id_tipo_vehiculo', $ticket->id_tipo_vehiculo)->find($ticket->servicio)->get();
        $tarifa         = Tarifas::select('valor')->where('id_tipo_vehiculo', $ticket->id_tipo_vehiculo)->groupBy('id')->havingRaw("id = max(id)")->get();
        $tipo           = TipoVehiculos::find($ticket->id_tipo_vehiculo);

        $total        = 0;
        $subtotal     = 0;
        $iva          = 0;
        $servicio     = 0;
        $des_servicio = null;
        $tarif        = 0;
        if (count($valor_servicio) > 0) {
            $servicio     = $valor_servicio[0]->valor;
            $des_servicio = $valor_servicio[0]->nombre;
        }

        if (count($tarifa) > 0) {
            $tarif = $tarifa[0]->valor;
        }

        $minutos  = $this->minutos_transcurridos($ticket->created_at, $ticket->fecha_fin);
        $valor    = (($minutos - $empresa->tiempo_gracia) / 60) * $tarif;
        $subtotal = $servicio + $valor;
        $iva      = 0;
        if ($empresa->iva > 0) {
            $iva = $subtotal * ($empresa->iva / 100);
        }
        $total = $subtotal + $iva;

        $factura = Facturas::create([
            'cajero'          => Auth::user()->id,
            'servicio' => $des_servicio,
            'valor_servicio'  => $servicio,
            'tipo_vehiculo'   => $tipo->nombre,
            'tiempo_gracia'  => $empresa->tiempo_gracia,
            'tiempo_cortesia' => $des_tiempo,
            'tiempo'          => $minutos,
            'tarifa'          => $tarif,
            'subtotal'        => $subtotal,
            'iva'             => $iva,
            'iva_fijado'      => $empresa->iva,
            'total'           => round($total)]);
        dd($factura);
        return view('facturas.generada', compact('factura'));
    }

/**
 * [minutos_transcurridos description]
 * @param  [type] $fecha_i [description]
 * @param  [type] $fecha_f [description]
 * @return [type]          [description]
 */
    public function minutos_transcurridos($fecha_i, $fecha_f)
    {
        $minutos = (strtotime($fecha_i) - strtotime($fecha_f)) / 60;
        $minutos = abs($minutos);
        $minutos = floor($minutos);
        return $minutos;
    }

/**
 * [facturanew description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
    public function facturanew(Request $request , $id)
    {
        $ticket = Tickets::select(DB::raw("tickets.id as id, placa, servicios.nombre AS servicio, tipo_vehiculos.nombre AS vehiculo, to_char(tickets.created_at, 'HH12:MI:SS') AS hora "))->join('servicios', 'servicios.id', '=', 'tickets.servicio')->join('tipo_vehiculos', 'tipo_vehiculos.id', '=', 'servicios.id_tipo_vehiculo')->whereRaw(" tickets.id = (select lpad($id::text, 10))::int ")->where('tickets.id', $id)->get();
        if (count($ticket) > 0) {
            $id = $ticket[0]->id;
            $this->actualizar_ticket($id);
            $this->facturar_ticket($id, '');
        } else {
            Session::flash('message-error', 'El ticket ingresado no existe');
            return $this->retorno("");
        }

    }

}
