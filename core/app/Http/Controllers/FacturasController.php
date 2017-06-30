<?php

namespace Parking\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Parking\Http\Controllers\Controller;
use Parking\Tickets;
use Session;
use Parking\Servicios;

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
            if(count($descuento)>0){
                $descuento = $descuento[0]->tiempo_cortesia;
            }
            $this->actualizar_ticket($id);
            $this->facturar_ticket($id,$des_tiempo);
        }
    }

    public function actualizar_ticket($id)
    {
      $ticket = Tickets::find($id);
      $ticket->fill(['fecha_fin'=>date("Y-m-d H:i:s")]);
      $ticket->save();
    }

      public function facturar_ticket($id, $des_tiempo)
    {
        $ticket = Tickets::find($id);
        $empresa = Configuraciones::find($id);
        $valor_servicio = Servicios::find($ticket->servicio);
        $tarifa = Tarifas::select('valor')->whereRaw("id = max(id)")->get();

        //calcular valores
        if($des_tiempo == ''){
            //factura nomal
            $diferencia = 
            $subtotal = $valor_servicio + $tarifa ;
            $iva = $subtotal*$empresa->iva%;
            $total = $subtotal + $iva;

        }else{
            //factura teniendo en cuenta cortesia
        }
       return view('facturas.generada', compact('ticket','empresas'));
    }

/**
 * [facturanew description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
    public function facturanew($id)
    {
        $ticket = Tickets::select(DB::raw("tickets.id as id, placa, servicios.nombre AS servicio, tipo_vehiculos.nombre AS vehiculo, to_char(tickets.created_at, 'HH12:MI:SS') AS hora "))->join('servicios', 'servicios.id', '=', 'tickets.servicio')->join('tipo_vehiculos', 'tipo_vehiculos.id', '=', 'servicios.id_tipo_vehiculo')->whereRaw(" tickets.id = (select lpad($id::text, 10))::int ")->groupBy()->get();
        if (count($ticket) > 0) {
            $id = $ticket[0]->id;
            $this->cortesia_ticket($id,$ticket[0]->cortesia)) 
            $this->mensualidad_ticket($ticket[0]->placa)) {
            $this->actualizar_ticket($id);
            $this->facturar_ticket($id,'');
                }
            }
        } else {
            Session::flash('message-error', 'El ticket ingresado no existe');
            return $this->retorno("");
        }
        
    }

}
}
