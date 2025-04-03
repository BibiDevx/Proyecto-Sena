<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'idProducto';
    protected $fillable = [
        'nombreProducto',
        'definicionProducto',
        'valorProducto',
        'idProveedor',
        'disponibilidad',
        'idMarca'
    ];
}
