<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use App\Models\Ciudad;
  use Illuminate\Database\QueryException;
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
            'imagen' => 'nullable|image',
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

         if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/usuarios'), $filename);
            $usuario->imagen = $filename;
        } else {
            $usuario->imagen = null; // O puedes asignar un valor por defecto
        }
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
  public function show(Usuario $usuario)
{
    $usuario->load('productos', 'ciudad');
    return view('usuarios.show', compact('usuario'));
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
            'imagen' => 'nullable|image',
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

           if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/usuarios'), $filename);
            $usuario->imagen = $filename;
        } else {
            $usuario->imagen = null; // O puedes asignar un valor por defecto
        }
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
    try {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        // Éxito
        return redirect('usuarios')->with('message', 'Usuario eliminado correctamente.')
                                   ->with('type', 'success');

    } catch (QueryException $e) {
        // Error por clave foránea (registros relacionados)
        if ($e->getCode() == 23000) {
            return redirect('usuarios')->with('message', 'No se puede eliminar el usuario porque tiene registros asociados.')
                                       ->with('type', 'warning');
        }

        // Otro error inesperado
        return redirect('usuarios')->with('message', 'Ocurrió un error al intentar eliminar el usuario.')
                                   ->with('type', 'error');
    }
}


       public function cambiarEstado(Usuario $usuario, Request $request)
{
    $request->validate([
        'estado' => 'required|boolean'
    ]);

    $usuario->estado = $request->estado;
    $usuario->save();

    return response()->json([
        'success' => true,
        'nuevoEstado' => $usuario->estado,
        'nuevoTexto' => $usuario->estado ? 'Activo' : 'Inactivo'
    ]);
}
}
