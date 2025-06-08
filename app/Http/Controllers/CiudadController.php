<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudad;
use Illuminate\Support\Facades\Validator;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
