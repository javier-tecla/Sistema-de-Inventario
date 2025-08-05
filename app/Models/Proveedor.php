<?php

namespace App\Models;

use App\Models\Lote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{
    /** @use HasFactory<\Database\Factories\ProveedorFactory> */
    use HasFactory;

    protected $table = 'proveedors';
    protected $fillable = [
        'empresa',
        'direccion',
        'nombre',
        'telefono',
        'email',

    ];

    public function Lotes()
    {
        return $this->hasMany(Lote::class);
    }
}
