<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriaProducto extends Model
{
    use HasFactory;

    protected $table = 'categoriaproducto';


    protected $fillable = [
        'idCategoria',
        'idProducto',
    ];
}
