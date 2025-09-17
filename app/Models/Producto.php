<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'categoria_id',
        'imagen',
        'usuario_id',
        'precio_compra',
        'precio_venta',
        'stock',
        'unidad_medida'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
