
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Mensual</title>
</head>

<body>

    <div>
        <h1 style="text-align: center;font-weight: bold;">Reporte de ventas de {{$meses[$mes]}} del {{$año}} </h1>
    </div>
    <div>
        <h4 id="importe">Importe Total: {{$importeTotal[0]->importe}}</h4>
    </div>
    <div>

            <table class="table table-light mt-1 " border="1" id="tabla">
                            <thead class="thead-light">
                                <tr>
                                    <th># Venta</th>
                                    <th>Empleado</th>
                                    <th>Cliente</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Importe Vendido</th>
                                    <th>Año</th>
                                    <th>Mes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->empleado}}</td>
                                        <td>{{$item->cliente}}</td>
                                        <td>{{$item->producto}}</td>
                                        <td>{{$item->cantidad}}</td>
                                        <td>{{$item->precio}}</td>
                                        <td>{{$item->importe}}</td>
                                        <td>{{$año}}</td>
                                        <td>{{$meses[$mes]}}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
    </div>
</body>

</html>


