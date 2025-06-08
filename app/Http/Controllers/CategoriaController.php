<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Categoria::all();

        return view('categorias.index', compact('data'));
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
            'nombre' => 'required|max:255|unique:categorias',
            'slug' => 'required|max:255|unique:categorias',
            'descripcion' => 'nullable|max:255',
            'imagen' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // dd($request->all());
        // dd($request->nombre);


        //    dd($request->all());
        $categoria = new Categoria();


        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;


        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/categorias'), $filename);
            $categoria->imagen = $filename;
        } else {
            $categoria->imagen = null; // O puedes asignar un valor por defecto
        }


        $categoria->save();

        return redirect('categorias')->with('message', 'Categoria creada correctamente')
        ->with('type', 'success');
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
        $categoria = Categoria::findOrFail($id);

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:categorias,nombre,' . $id,
            'slug' => 'required|max:255|unique:categorias,slug,' . $id,
            'descripcion' => 'nullable|max:255',
            'imagen' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $categoria = Categoria::findOrFail($id);

        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/categorias'), $filename);
            $categoria->imagen = $filename;
        }   

        $categoria->save();

        return redirect('categorias')->with('message', 'Categoria editada correctamente')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        if($categoria->productos()->count() > 0) {
            return redirect('categorias')->with('message', 'No se puede eliminar la categoria porque tiene productos asociados')
            ->with('type', 'warning');
        }
        $categoria->delete();

        return redirect('categorias')->with('message', 'Categoria eliminada correctamente')
        ->with('type', 'danger');
    }
}
