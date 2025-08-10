<?php

namespace App\Livewire\Admin\Compras;

use Exception;
use App\Models\Lote;
use App\Models\Compra;
use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ItemsCompra extends Component
{

    public Compra $compra;

    public $productoId;

    public $cantidad = 1;

    public $precioUnitario;

    public $precioCompra;

    public $precioVenta;

    public $fechaVencimiento;

    public $codigoLote;

    public $productos;

    public $totalCompra;

    //este metodo se ejecuta cuando el componente se carga inicialmente
    public function mount(Compra $compra){
        $this->compra = $compra;
        $this->productos = Producto::all();
        $this->cargarDatos();
    }

    public function cargarDatos(){
        $this->compra->load('detalles.producto', 'detalles.lote');
        $this->totalCompra = $this->compra->detalles->sum('subtotal');

        //reiniciar los campos del formulario
        $this->reset(['productoId', 'cantidad', 'precioUnitario', 'precioCompra', 'precioVenta', 'fechaVencimiento', 'codigoLote']);
        $this->cantidad = 1;
    }

    public function agregarItems(){
        $this->validate();

        DB::beginTransaction();
        try{
            $producto = Producto::find($this->productoId);
            $loteId = null;

            // creacion del Lote
            $lote = Lote::create([
                'producto_id' => $producto->id,
                'proveedor_id' => $this->compra->proveedor->id,
                'codigoLotye' => $this->codigoLote,
                'fecha_entrada' => now()->toDateString(),
                'fecha_vencimiento' => $this->fechaVencimiento,
                'cantidad_inicial' => 0,
                'cantidad_actual' => 0,
                'precio_compra' => $this->precioCompra,
                'precio_venat' => $this->precioVenta,
                'estado' => true,
            ]);

            $loteId = $lote->id;

            // creacion del detalle de compra
            $this->compra->detalles()->create([
                'producto_id' => $producto->id,
                'lote_id' => $loteId,
                'cantidad' => $this->cantidad,
                'precio_unitario' => $this->precioUniotario,
                'subtotal' => $this->cantidad * $this->precioUnitario,
            ]);

            //recalcular el total de la compra y lo guardamos

            $this->compra->total = $this->compra->detalles->sum('subtotal');
            $this->compra->save();

            DB::commit();

            $this->cargarDatos();

        }catch(Exception $e){
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.admin.compras.items-compra');
    }
}
