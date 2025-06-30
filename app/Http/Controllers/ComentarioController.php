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
}
