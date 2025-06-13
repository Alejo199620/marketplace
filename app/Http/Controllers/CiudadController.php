<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $data = Ciudad::all();

            return view('ciudades.index', compact('data'));
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
            'nombre' => 'required|max:255|unique:ciudades',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // dd($request->all());
        // dd($request->nombre);


        //    dd($request->all());
        $ciudad = new Ciudad();


        $ciudad->nombre = $request->nombre;

        $ciudad->save();

        return redirect('ciudades');
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
        $ciudad = Ciudad::findOrFail($id);

        return view('ciudades.edit', compact('ciudad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:ciudades,nombre,' . $id,
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->nombre = $request->nombre;
        $ciudad->save();
        return redirect('ciudades')->with('message', 'Ciudad editada correctamente')
            ->with('type', 'info');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ciudad = Ciudad::findOrFail($id);

        if ($ciudad->productos()->count() > 0) {
            return redirect('ciudades')->with('message', 'No se puede eliminar la ciudad')
                ->with('type', 'warning');
        }
        $ciudad->delete();

        return redirect('ciudades')->with('message', 'Ciudad eliminada correctamente')
            ->with('type', 'danger');
    }
}
