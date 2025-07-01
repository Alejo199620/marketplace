<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comentario;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
      $data = Comentario::all();

      return view('comentarios.index', compact('data'));

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
        //
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
        $comentario = Comentario::findOrFail($id);

        return view('comentarios.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [

            'descripcion' => 'nullable|max:255',
            'valoracion'=> 'required|integer|min:1|max:5',


        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $comentario = Comentario::findOrFail($id);

        $comentario->descripcion = $request->descripcion;
        $comentario->valoracion = $request->valoracion;



        $comentario->save();

        return redirect('comentarios')->with('message', 'comentario editada correctamente')
        ->with('type', 'info');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

{
    try {
        $comentario = Comentario::findOrFail($id);

        // Eliminar directamente sin verificar relaciones
        $comentario->delete();

        return redirect('comentarios')->with([
            'message' => 'Comentario eliminado correctamente',
            'type' => 'success'
        ]);

    } catch (\Exception $e) {
        return redirect('comentarios')->with([
            'message' => 'Error al eliminar el comentario: '.$e->getMessage(),
            'type' => 'error'
        ]);
    }
}
    public function cambiarEstado(Request $request, $id)
{
    try {
        $comentario = Comentario::findOrFail($id);
        $comentario->estado = $request->estado;
        $comentario->save();

        return response()->json([
            'success' => true,
            'message' => 'Estado del comentario actualizado',
            'nuevoEstado' => $comentario->estado
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

public function storeFromFront(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'email' => 'required|email|max:100',
        'comentario' => 'required|string|max:500',
        'valoracion' => 'sometimes|integer|between:1,5',
        'producto_id' => 'required|exists:productos,id'
    ]);

    Comentario::create([
        'descripcion' => "Nombre: {$request->nombre}\nEmail: {$request->email}\nComentario: {$request->comentario}",
        'valoracion' => $request->valoracion ?? 4,
        'producto_id' => $request->producto_id,
        'estado' => 1, // 1 para aprobado, 0 para pendiente
        'usuario_id' => null
    ]);

    return back()->with('success', '¡Gracias por tu comentario!');
}
}
