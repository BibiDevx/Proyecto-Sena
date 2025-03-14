<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'idProducto';
    protected $foreignKey = 'idProveedor';
    protected $fillable = [
        'idProducto',
        'nombreProducto',
        'definicionProducto',
        'valorProducto',
        'idProveedor',
        'disponibilidad',
    ];
}
