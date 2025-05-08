<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrito extends Model
{
    use HasFactory;

    protected $table = "carrito"; 
    protected $primaryKey = "idCarrito";

    protected $fillable = [
        "idCarrito",
        "idUsuario", 
        "estado"     
    ];

    public function productos()
    {
        // Relación de muchos a muchos
        return $this->belongsToMany(Producto::class, 'carrito_producto', 'idCarrito', 'idProducto')
                    ->withPivot('cantidad'); 
    }

    public function usuario()
    {
        // Relación con usuario
        return $this->belongsTo(Usuario::class, "idUsuario");
    }
}
