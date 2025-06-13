<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use App\Models\Ciudad;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $data = Usuario::all();

            return view('usuarios.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //realiza la validacion de los datos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:usuarios',
            'movil' => 'required|min:10|unique:usuarios',
            'email' => 'required|email|max:255|unique:usuarios',
            'password' => 'required|min:8',
            'rol' => 'required|in:admin,vendedor',
            'ciudad_id' => 'required|max:255',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // dd($request->all());
        // dd($request->nombre);


        //    dd($request->all());
        $usuario = new Usuario();


        $usuario->nombre = $request->nombre;
        $usuario->movil = $request->movil;
        $usuario->email = strtolower($request->email);
        $usuario->password = bcrypt($request->password);
        $usuario->rol = $request->rol;
        $usuario->ciudad_id = $request->ciudad_id;




        $usuario->save();

        return redirect('usuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $usuario = Usuario::findOrFail($id);
        $ciudades = Ciudad::all();

        return view('usuarios.edit', compact('usuario', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:usuarios,nombre,' . $id,
            'movil' => 'required|min:10|unique:usuarios,movil,' . $id,
            'email' => 'required|email|max:255|unique:usuarios,email,' . $id,
            'password' => 'nullable|min:8',
            'rol' => 'required|in:admin,vendedor',
            'ciudad_id' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $usuario = Usuario::findOrFail($id);

        $usuario->nombre = $request->nombre;
        $usuario->movil = $request->movil;
        $usuario->email = strtolower($request->email);
        if ($request->password) {
            $usuario->password = bcrypt($request->password);
        }
        $usuario->rol = $request->rol;
        $usuario->ciudad_id = $request->ciudad_id;

        $usuario->save();

        return redirect('usuarios')->with('message', 'Usuario editado correctamente')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect('usuarios')->with('message', 'Usuario eliminado correctamente')
            ->with('type', 'danger');
    }
}
