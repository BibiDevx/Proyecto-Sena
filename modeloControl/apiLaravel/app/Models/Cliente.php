<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey = 'idCliente';
    protected $foreignKey = 'idUsuario';
    protected $fillable = [
        'idCliente',
        'idUsuario',
        'nombreCliente',
        'apellidoCliente',
        'cedulaCliente',
        'correoCliente',
        'passwordCliente',
        'telefonoCliente',
        'direccionCliente'
    ];
}
