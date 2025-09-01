<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Mail\CompraProveedorMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\MovimientoInventario;
use Illuminate\Support\Facades\Mail;
use App\Models\InventarioSucursalLote;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        return view('admin.compras.index', compact('compras'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $sucursales = Sucursal::all();
        return view('admin.compras.create', compact('proveedores', 'productos', 'sucursales'));
    }

    public function store(Request $request)
    {
        // return response()->json(request()->all());
        $request->validate([
            'proveedor_id' => 'required|exists:proveedors,id',
            'fecha' => 'required|date',
            'productos' => 'nullable|string|max:255',
        ]);

        $compra = new Compra();
        $compra->proveedor_id = $request->proveedor_id;
        $compra->fecha = $request->fecha;
        $compra->observaciones = $request->observaciones;
        $compra->total = 0; // Inicializar el total a 0
        $compra->estado = 'pendiente'; // Estado inicial de la compra
        $compra->save();

        return redirect()->route('compras.edit', $compra->id)
            ->with('mensaje', 'Compra creada exitosamente, ahora puede añadir productos')
            ->with('icono', 'success');
    }

    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $sucursales = Sucursal::all();
        return view('admin.compras.edit', compact('compra', 'proveedores', 'productos', 'sucursales'));
    }

    public function enviarCorreo(Compra $compra)
    {
        $compra->load('detalles.producto', 'proveedor');

        $compra->estado = 'enviado al proveedor';
        $compra->save();

        $proveedorEmail = $compra->proveedor->email;

        Mail::to($proveedorEmail)->send(new CompraProveedorMail($compra));
        return redirect()->route('compras.edit', $compra->id)
            ->with('mensaje', 'Correo enviado exitosamente al proveedor')
            ->with('icono', 'success');
    }

    public function finalizarCompra(Request $request, Compra $compra)
    {
        $compra->load('detalles.producto', 'proveedor');

        if ($compra->detalles->isEmpty()) {
            return redirect()->back()
                ->with('mensaje', 'No se puede finalizar la compra sin productos')
                ->with('icono', 'error');
        }

        $request->validate([
            'sucursal_id' => 'required',
        ]);

        DB::beginTransaction();
        try {

            foreach ($compra->detalles as $detalle) {
                $lote = $detalle->lote;
                $producto = $detalle->producto;

                //actualizar la cantidad de lote en la tabla Lotes
                $lote->cantidad_actual = $lote->cantidad_actual + $detalle->cantidad;
                $lote->save();

                //actualizar o crear el registro en inventario_sucursales_lote
                $inventarioLote = InventarioSucursalLote::firstOrCreate([
                    'lote_id' => $lote->id,
                    'sucursal_id' => $request->sucursal_id,
                    'cantidad_en_sucursal' => 0,
                ]);
                $inventarioLote->cantidad_en_sucursal = $inventarioLote->cantidad_en_sucursal + $detalle->cantidad;
                $inventarioLote->save();

                //registrar el movimiento en la tabla movimiento_inventario
                $movimientoInventario = MovimientoInventario::create([
                    'producto_id' => $producto->id,
                    'lote_id' => $lote->id,
                    'sucursal_id' => $request->sucursal_id,
                    'tipo_movimiento' => 'Entrada',
                    'cantidad' => $detalle->cantidad,
                    'fecha' => now(),
                ]);
            }
            //actualizar el estado de la compra
            $compra->estado = 'Recibido';
            $compra->save();

            DB::commit();

            return redirect()->route('compras.index')
                ->with('mensaje', 'La compra se finalizó exitosamente')
                ->with('icono', 'success');

        } catch (\Exception $e) {
            DB::rollBack();
            dd('Error al finalizar la compra, '.$e->getMessage());
        }
    }
}
