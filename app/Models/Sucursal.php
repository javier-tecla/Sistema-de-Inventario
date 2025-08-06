<?php

namespace App\Models;

use App\Models\InventarioSucursalLote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sucursal extends Model
{
    /** @use HasFactory<\Database\Factories\SucursalFactory> */
    use HasFactory;

    protected $table = 'sucursals';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'activa',
    ];

    public function inventario_sucursal_lotes()
    {
        return $this->hasMany(InventarioSucursalLote::class);
    }
    
     public function movimientoInventario()
    {
        return $this->hasMany(MovimientoInventario::class);
    }
}