<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Productos</title>

    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Reporte de Productos</h1>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Marca</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->codigo }}</td>
                    <td>{{ $product->nombre }}</td>
                    <td>${{ number_format($product->precio, 2) }}</td>
                    <td>{{ $product->marca_nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>