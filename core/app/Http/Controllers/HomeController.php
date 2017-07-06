<?php

namespace Parking\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Parking\Configuraciones;
use Parking\Servicios;
use Parking\Tickets;
use Parking\TipoVehiculos;
use Parking\User;
use Parking\Permisos;
use Parking\Perfiles;
use Parking\Funcionalidades;

class HomeController extends Controller
{

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'create', 'edit', 'show', 'update', 'destroy']]);
    }

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
            $stock_carros  = 0;
            $stock_motos   = 0;
            if (count($stock) > 0) {
                $stock_carros = $stock->stock_carros - $carros;
                $stock_motos  = $stock->stock_motos - $motos;
            }
            return view('home', compact('tipovehiculos', 'servicios', 'carros', 'motos', 'stock_carros', 'stock_motos'));
        }
        $this->configurar();
        return view('auth.login');

    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function configurar()
    {
        //
        $count = Perfiles::select()->get()->count();
        if ($count == 0) {
            $permisos = Funcionalidades::select()->get();
            Perfiles::create(['nombre' => 'Super Su','usuario'=>1]);
            foreach ($permisos as $value) {
                Permisos::create(['id_perfil' => 1, 'id_funcionalidad' => $value->id]);
            }
            User::create(['name' => 'Admin', 'email' => 'Admin', 'password' => 'Admin', 'id_perfil' => 1,'usuario'=>1]);
        }
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
