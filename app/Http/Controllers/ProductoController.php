<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

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
    public function show(string $id)
    {
        //
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
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('productos')->with('message', 'Producto eliminado correctamente')
            ->with('type', 'danger');
    }
}
