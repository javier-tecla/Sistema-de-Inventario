<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de compra Nro. {{ $compra->id }}</title>
</head>
<body>
    <h1>Orden de compra Nro. {{ $compra->id }}</h1>
    <p>Estimado/a Proveedor: {{ $proveedor->nombre }}</p>
    <p>Ajuntamos los detalles de la orden de compra en fecha: {{ $compra->fecha }}</p>

    <table style="width: 100%;border-collapse:collapse;">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($detalles as $detalle)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Saludos cordiales, esperando su respuesta.</p>
</body>
</html>