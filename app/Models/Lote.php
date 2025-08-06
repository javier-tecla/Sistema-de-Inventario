<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\InventarioSucursalLote;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lotes';

    protected $fillable = [
        'producto_id',
        'proveedor_id',
        'codigo_lote',
        'fecha_entrada',
        'fecha_vencimiento',
        'cantidad_inicial',
        'cantidad_actual',
        'precio_compra',
        'precio_venta',
        'estado',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function inventarioSucursalLotes()
    {
        return $this->hasMany(InventarioSucursalLote::class);
    }

     public function movimientoInventario()
    {
        return $this->hasMany(MovimientoInventario::class);
    }
}
