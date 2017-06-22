<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Parking\Http\Requests;
use Parking\User;
use Parking\Perfiles;
use Session;
use Redirect;
use Auth;

class UsuariosController extends Controller
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
        $this->usuario = User::find($route->getParameter('usuarios'));
        $this->notFound($this->usuario);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = User::select('usuarios.id', 'usuarios.email', 'usuarios.name', 'perfiles.nombre as perfil')->join('perfiles', 'perfiles.id', '=', 'usuarios.id_perfil')->get();
        return view('usuarios.admin', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $perfiles = Perfiles::lists('nombre', 'id')->toArray();
        return view('usuarios.new', compact('perfiles'));
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
        if (User::create($request->all())) {
            Session::flash('message-success', 'Usuario ' . $request['nombre'] . ' creado correctamente');
        } else {
            Session::flash('message-error', 'Error al crear usuario' . $request['nombre']);
        }
        return $this->retorno("usuarios");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function valid(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            if (Hash::check($id, Auth::user()->password)) {
                return response("ok", $httpStatusCode = 200, $headers = []);
            }
            return response($id, $httpStatusCode = 406, $headers = []);
        }
        abort(404);

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
        $usuarios = $this->usuario;
        $perfiles = Perfiles::lists('nombre', 'id')->toArray();
        return view('usuarios.edit', compact('usuarios', 'perfiles'));
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

        $this->usuario->fill($request->all());
        if ($this->usuario->save()) {
            Session::flash('message-success', 'Usuario ' . $request['nombre'] . ' actualizado correctamente');
        } else {
            Session::flash('message-error', 'Error al actualizar usuario' . $request['nombre']);
        }

        return $this->retorno("usuarios");
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

        $usuario = User::find($id);
        $usuario->fill(['estado' => 2]);
        if ($usuario->save()) {
            Session::flash('message-success', 'Usuario ' . $usuario->nombre . ' inactivado correctamente');
        } else {
            Session::flash('message-error', 'Error al inactivar usuario ' . $usuario->nombre);
        }
        return $this->retorno("usuarios");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        //
        $usuario = User::find($id);
        $usuario->fill(['estado' => 1]);
        if ($usuario->save()) {
            Session::flash('message-success', 'Usuario ' . $usuario->nombre . ' activado correctamente');
        } else {
            Session::flash('message-error', 'Error al activar usuario ' . $usuario->nombre);
        }
        return $this->retorno("usuarios");
    }

/**
 * [change description]
 * @param  Request $request [description]
 * @return [type]           [description]
 */
    public function change(Request $request)
    {
        //
        $usuario = User::find(Auth::user()->id);
        $usuario->fill(['password' => $request['password']]);
        if ($usuario->save()) {
            Session::flash('message-success', 'Contraseña cambiada correctamente, Ingrese con su nueva contraseña');
        } else {
            Session::flash('message-error', 'Error al cambiar la contraseña');
        }

        return Redirect::to("/auth/logout");
    }

/**
 * [image description]
 * @param  Request $request [description]
 * @return [type]           [description]
 */
    public function image(Request $request)
    {
        //
        $usuario = User::find(Auth::user()->id);
        $usuario->fill(['foto' => $request['foto']]);
        if ($usuario->save()) {
            Session::flash('message-success', 'Imagen de perfil cambiada correctamente');
        } else {
            Session::flash('message-error', 'Error al cambiar imagen de perfil');
        }

        return Redirect::to("/" . $request['ruta']);
    }

/**
 * [unique description]
 * @param  Request $request [description]
 * @param  [type]  $id      [description]
 * @return [type]           [description]
 */
    public function unique(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            $usuario = User::where('email', $id)->get();
            if (count($usuario) > 0) {
                return response($id, $httpStatusCode = 406, $headers = []);
            } else {
                return response("ok", $httpStatusCode = 200, $headers = []);
            }
        }
        abort(404);

    }
}
