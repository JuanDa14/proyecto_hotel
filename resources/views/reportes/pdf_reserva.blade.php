<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Reporte</title>
</head>

<body>
    <div style="border: 1px solid #555; border-radius: 20px; padding: 1rem">

        <div class="mb-3">
            <div>
                <h1 style="text-align: center; font-weight: bold; text-decoration: underline; margin-bottom: 1rem;">
                    Reporte de Reservas
                </h1>
            </div>

            <div style="max-width: 18rem; margin-top: rem; display: inline-block;">
                <span style="display: block;">Hotel San Jose S.A.C</span>
                <span style="display: block; max-width: 80%;">Centro Lima Av. Bolivia 148 Int 552 553 Central (01) 425
                    -1191</span>
                <span style="display: block;"> <b>Tel.</b> 837499288</span>
            </div>
        </div>

        <div>
            <h1>Hotel San Jose</h1>
            <span style="display: block;margin-top:-1rem; ">R.U.C.20552103816</h5>
        </div>

        <div style="margin-top: 1rem;">
            <table class="table table-light" style="text-align: center; border: solid 1px; width: 100%">
                <thead class="thead-light">
                    <tr>
                        <th>Recepcionista</th>
                        <th>Cliente</th>
                        <th>Habitacion</th>
                        <th>Importe</th>
                        <th>Mes</th>
                        <th>Año</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->name }} {{ $reserva->apellidos }}</td>
                        <td>{{ $reserva->cliente }}</td>
                        <td>{{ $reserva->tipohabitacion }}</td>
                        <td>{{ $reserva->importe }}</td>
                        <td>{{ $m }}</td>
                        <td>{{ $a }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: right; margin-top: 20px">
                <span style="display: block; font-weight: bold;">Total: {{ $importeTotal }}</span>
            </div>
        </div>
    </div>
</body>

</html>