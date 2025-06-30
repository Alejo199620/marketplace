<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categorias = Categoria::where('estado', 1)
        ->with('productos')
        ->has('productos')
        ->orderBy('nombre', 'asc')
        ->get();


        return view('market.index', compact('categorias'));
    }



}
