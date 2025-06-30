<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'estado',
        'usuario_id',
        'categoria_id',
    ];
/**
     * Get the category that owns the product.
     */

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'producto_id');
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'producto_id');
    }



}
