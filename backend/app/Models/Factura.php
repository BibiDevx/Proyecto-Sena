<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factura extends Model
{
    use HasFactory;

    protected $table = "factura";
    protected $primaryKey = "idFactura";

    public $timestamps = false;

    protected $fillable = [
        "idPedido",
        "fechaFactura",
        "metodoPago",
        "estadoFactura",
        "subtotal",
        "iva",
        "total",
        "observaciones"
    ];

    protected $casts = [
        "fechaFactura" => "datetime",
        "subtotal" => "decimal:2",
        "iva" => "decimal:2",
        "total" => "decimal:2"
    ];

    // Relación entre factura y pedido
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class, "idPedido");
    }

    // Relación factura y detalles
    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleFactura::class, "idFactura");
    }

    // buscar factura por mes
    public function scopeDelMes($query, $mes)
    {
        return $query->whereMonth("fechaFactura", $mes);
    }

    // facturas por año
    public function scopeDelAnio($query, $anio)
    {
        return $query->whereYear("fechaFactura", $anio);
    }

    // Método opcional para calcular subtotal, iva y total basado en detalles
    public function calcularTotales()
    {
        $this->subtotal = $this->detalles->sum(function ($detalle) {
            return $detalle->precio_unitario * $detalle->cantidad;
        });

        $this->iva = $this->subtotal * 0.19; // 19% de IVA 
        $this->total = $this->subtotal + $this->iva;
    }
}
