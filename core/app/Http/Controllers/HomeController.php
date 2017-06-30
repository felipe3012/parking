<?php

namespace Parking\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Parking\Configuraciones;
use Parking\Servicios;
use Parking\Tickets;
use Parking\TipoVehiculos;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            $servicios     = Servicios::lists('nombre', 'id')->toArray();
            $tipovehiculos = TipoVehiculos::lists('nombre', 'id')->toArray();
            $carros        = Tickets::whereNull('fecha_fin')->where('id_tipo_vehiculo', 2)->count();
            $motos         = Tickets::whereNull('fecha_fin')->where('id_tipo_vehiculo', 1)->count();
            $stock         = Configuraciones::find(1);
            $stock_carros =0;
            $stock_motos = 0;
            if (count($stock) > 0) {
                $stock_carros = $stock->stock_carros - $carros;
                $stock_motos  = $stock->stock_motos - $motos;
            }
            return view('home', compact('tipovehiculos', 'servicios', 'carros', 'motos', 'stock_carros', 'stock_motos'));
        }
        return view('auth.login');

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
}
