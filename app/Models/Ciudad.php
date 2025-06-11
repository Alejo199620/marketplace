<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades';

    protected $fillable = [
        'nombre',
        'estado',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'ciudad_id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'ciudad_id');
    }
}
