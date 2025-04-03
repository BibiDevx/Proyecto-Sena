<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marca';

    protected $primaryKey = 'idMarca';

    protected $fillable = [
        'idMarca',
        'nombreMarca'
    ];
}

