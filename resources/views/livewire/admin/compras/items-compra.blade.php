<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="productoId">Producto <sup class="text-danger">(*)</sup></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <select name="" wire:model='productoId' id="" class="form-control select2">
                        <option value="">Seleccione un producto...</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->codigo . ' - ' . $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                @error('productoId')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="codigoLote">Lote <sup class="text-danger">(*)</sup></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input type="text" wire:model="codigoLote" style="text-align: center" class="form-control">
                </div>
                @error('codigoLote')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="cantidad">Cantidad <sup class="text-danger">(*)</sup></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input type="number" wire:model="cantidad" style="text-align: center" class="form-control">
                </div>
                @error('cantidad')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="precioUnitario">Precio Unitario <sup class="text-danger">(*)</sup></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input type="number" wire:model="precioUnitario" style="text-align: center" class="form-control">
                </div>
                @error('precioUnitario')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="fechaVencimiento">Fecha de vencimiento </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="date" wire:model="fechaVencimiento" class="form-control">
                </div>
                @error('fechaVencimiento')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-1">
            <div style="height: 32px"></div>
            <div class="form-group">
                <button class="btn btn-primary" wire:click="agregarItems">Agregar</button>
            </div>
        </div>


        <div x-data
            x-on:mostrar-alerta.window="
                Swal.fire({
                icon: $event.detail.icono,
                title: $event.detail.mensaje,
                showConfirmButton: false,
                timer: 2000,
            })">
        </div>
    </div>
</div>
