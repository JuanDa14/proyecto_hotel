<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
</head>

<body>
    <div>
        <h1 style="text-align: center;font-weight: bold;">Reporte de Impuesto</h1>
    </div>
    <div>
        <h3>Numero de impuesto registrado : <span>{{ $impuesto->id }}</span></h3>
    </div>
    <div>
        <h3>Fecha : {{ date('d-m-y', strtotime($impuesto->fecha)) }}</h3>
    </div>
    <div>
        <h3>Nombre de la Empresa : </h3><label>Pasteleria Pimentel</label>
        <h3>Ubicacion : </h3><label>Centro Lima Av. Bolivia 148 Int 552 553 Central (01) 425 -1191</label>
    </div>
    <div>
        <h3>Contador : </h3><label>{{ $impuesto->contador }}</label>
    </div>
    <div>
        <h3>Dni del contador : </h3><label>{{ $impuesto->dniContador }}</label>
    </div>
    <div>
        <table class="table table-light" style="text-align: center;border:solid 1px;width:100%">
            <thead class="thead-light">
                <tr>
                    <th>Nombre del contador</th>
                    <th>Dni del contador</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $impuesto->contador }}</td>
                        <td>{{ $impuesto->dnicontador }}</td>
                        <td>{{ $impuesto->fecha }}</td>
                        <td>S/ {{ $impuesto->monto}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
