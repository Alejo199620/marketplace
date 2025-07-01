<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
 use Illuminate\Database\QueryException;
 use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $data = Producto::all();

            return view('productos.index', compact('data'));
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
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:255|unique:productos',
            'slug' => 'required|max:255|unique:productos',
            'descripcion' => 'nullable|max:255',
            'valor' => 'required|numeric',
            'imagen' => 'nullable|image',

            'estado_producto' => 'required|in:nuevo,poco uso,usado',
            'categoria_id' => 'required|exists:categorias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'ciudad_id' => 'required|exists:ciudades,id',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $producto = new Producto();

        $producto->titulo = $request->titulo;
        $producto->slug = $request->slug;
        $producto->descripcion = $request->descripcion;
        $producto->valor = $request->valor;
        $producto->estado_producto = $request->estado_producto;
        $producto->categoria_id = $request->categoria_id;
        $producto->usuario_id = $request->usuario_id;
        $producto->ciudad_id = $request->ciudad_id;
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/productos'), $filename);
            $producto->imagen = $filename;
        } else {
            $producto->imagen = null; // O puedes asignar un valor por defecto
        }
        $producto->save();
        return redirect('productos');
    }

    /**
     * Display the specified resource.
     */
public function info($id)
{
    // Obtener el producto actual
    $producto = Producto::with(['usuario', 'ciudad', 'categoria'])->findOrFail($id);

    // Obtener productos relacionados (misma categoría)
    $productosRelacionados = Producto::where('categoria_id', $producto->categoria_id)
        ->where('id', '!=', $producto->id)
        ->get();

    // Obtener el promedio de valoraciones desde la tabla comentarios
    $promedioValoracion = DB::table('comentarios')
        ->where('producto_id', $producto->id)
        ->where('estado', 1)
        ->avg('valoracion') ?? 0;

    return view('market.info', compact('producto', 'productosRelacionados', 'promedioValoracion'));
}


public function show(Producto $producto)
{
    $productosRelacionados = Producto::where('categoria_id', $producto->categoria_id)
                                    ->where('id', '!=', $producto->id)
                                    ->inRandomOrder()

                                    ->get();

    return view('productos.show', compact('producto', 'productosRelacionados'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:255|unique:productos,titulo,' . $id,
            'slug' => 'required|max:255|unique:productos,slug,' . $id,
            'descripcion' => 'nullable|max:255',
            'valor' => 'required|numeric',
            'imagen' => 'nullable|image',
            'estado_producto' => 'required|in:nuevo,poco uso,usado',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $producto = Producto::findOrFail($id);

        $producto->titulo = $request->titulo;
        $producto->slug = $request->slug;
        $producto->descripcion = $request->descripcion;
        $producto->valor = $request->valor;
        $producto->estado_producto = $request->estado_producto;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/productos'), $filename);
            $producto->imagen = $filename;
        }

        $producto->save();

        return redirect('productos')->with('message', 'Producto actualizado correctamente')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */


public function destroy(string $id)
{
    try {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('productos')->with('message', 'Producto eliminado correctamente.')
                                     ->with('type', 'success');

    } catch (QueryException $e) {
        if ($e->getCode() == 23000) {
            return redirect('productos')->with('message', 'No se puede eliminar el producto porque está relacionado con otros registros.')
                                         ->with('type', 'warning');
        }

        return redirect('productos')->with('message', 'Ocurrió un error al intentar eliminar el producto.')
                                     ->with('type', 'error');
    }
}


public function cambiarEstado(Request $request, $id)
{
    try {
        $producto = Producto::findOrFail($id);
        $producto->estado = $request->estado;
        $producto->save();

        return response()->json([
            'success' => true,
            'message' => 'Estado actualizado correctamente'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

public function buscar(Request $request)
{
    $query = $request->input('query');

    $productos = Producto::where('titulo', 'like', '%' . $query . '%')
        ->limit(5)
        ->get(['id', 'titulo', 'valor', 'imagen']);

    return response()->json($productos);
}






}
