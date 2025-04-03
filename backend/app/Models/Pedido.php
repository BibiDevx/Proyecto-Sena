<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $primaryKey = 'idPedido';
    protected $foreignkey = 'idCliente';

    protected $fillable = [
        'idPedido',
        'idCliente',
        'fechaPedido'
    ];
}
