<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $primaryKey = 'idAdmin';
    protected $foreignKey = 'idUsuario';

    protected $fillable = [
        'idAdmin',
        'idUsuario',
        'nombreAdmin',
        'apellidoAdmin',
        'correoAdmin',
        'claveAdmin',
        'telefonoAdmin'
    ];
        
}
