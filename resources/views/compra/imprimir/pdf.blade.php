<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden De Compra</title>
</head>

<body>
    <div>
        <h1 style="text-align: center;font-weight: bold;">Orden de Compra</h1>
    </div>
    <div>
        <h3>Numero de orden de Compra : <span>{{ $idcompra }}</span></h3>
    </div>
    <div>
        <h3>Fecha : {{ date('d-m-y', strtotime($compra->created_at)) }}</h3>
    </div>
    <div>
        <h3>Nombre de la Empresa : </h3><label>Pasteleria Pimentel</label>
        <h3>Ubicacion : </h3><label>Centro Lima Av. Bolivia 148 Int 552 553 Central (01) 425 -1191</label>
    </div>
    <div>
        <h3>Proveedora : </h3><label>{{ $compra->proveedora }}</label>
    </div>
    <div>
        <table class="table table-light" style="text-align: center;border:solid 1px;width:100%">
            <thead class="thead-light">
                <tr>
                    <th>Insumos</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($ArrayInsumos); $i++)
                    <tr>
                        <td>{{ $ArrayInsumos[$i] }}</td>
                        <td>{{ $Arraycantidades[$i] }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</body>
</html>
