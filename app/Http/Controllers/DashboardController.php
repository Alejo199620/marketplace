<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Comentario;
use App\Models\Categoria;

class DashboardController extends Controller
{
    public function index()
    {
        $estadisticas = [
            'productos' => Producto::count(),
            'usuarios' => Usuario::count(),
            'comentarios' => Comentario::count(),
            'categorias' => Categoria::count(),
            'productos_activos' => Producto::where('estado', 1)->count(),
            'productos_inactivos' => Producto::where('estado', 0)->count(),
        ];

        $productosPorCategoria = Categoria::withCount('productos')->get();

        $usuariosPorMes = Usuario::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as mes, COUNT(*) as total")
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        return view('home', compact('estadisticas', 'productosPorCategoria', 'usuariosPorMes'));
    }
}
