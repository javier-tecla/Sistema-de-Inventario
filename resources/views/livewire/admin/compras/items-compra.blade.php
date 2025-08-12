<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="producto">Producto <sup class="text-danger">(*)</sup></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <select name="" id="" class="form-control select2">
                        <option value="">Seleccione un producto...</option>
                        @foreach ($productos as $producto)
                            <option value="">{{ $producto->codigo . ' - ' . $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                @error('producto')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="lote">Lote <sup class="text-danger">(*)</sup></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input type="text" style="text-align: center" class="form-control">
                </div>
                @error('lote')
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
                    <input type="number" style="text-align: center" class="form-control">
                </div>
                @error('cantidad')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="precio_unitario">Precio Unitario <sup class="text-danger">(*)</sup></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                    </div>
                    <input type="number" style="text-align: center" class="form-control">
                </div>
                @error('precio_unitario')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="fecha_vencimiento">Fecha de vencimiento </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="date" class="form-control">
                </div>
                @error('fecha_vencimiento')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-1">
            <div style="height: 32px"></div>
            <div class="form-group">
                <button class="btn btn-primary" wire:click="prueba">Agregar</button>
            </div>
        </div>

        <hr>
        <input type="text" wire:model="cantidad">
        Cantidad: {{ $cantidad }}

    </div>
</div>
