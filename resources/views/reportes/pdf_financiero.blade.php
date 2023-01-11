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
                    Reporte Financiero
                </h1>
            </div>

            <div style="max-width: 18rem; margin-top: rem; display: inline-block;">
                <span style="display: block;">Estado de Situacion financiera (en soles)</span>
            </div>
        </div>

        <div>
            <h1>Hotel San Jose</h1>
            <span style="display: block;margin-top:-1rem; ">R.U.C.20552103816</h5>
        </div>

        <div style="margin-top: 1rem;">
            <p class="card-title">Costos</p>
            <table class="table table-light" style="text-align: center; border: solid 1px; width: 100%">
                <thead class="thead-light">
                    <tr>
                        <th>Activo</th>
                        <th>Cantidad</th>
                        <th>Total activo</th>
                        <th>Mes</th>
                        <th>Año</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($financieros->isNotEmpty())
                    @foreach ($financieros as $financiero)
                    <tr>
                        <th>{{$financiero->producto}}</th>
                        <th>{{$financiero->cantidad}}</th>
                        <th>{{$financiero->totalactivo}}</th>
                        <td>{{ $m }}</td>
                        <td>{{ $a }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">No hay registros</td>
                    </tr>
                    @endif
                </tbody>
            </table>


            <div style="text-align: right; margin-top: 20px">
                <span style="display: block; font-weight: bold;">Total: {{ $importeCostos }}</span>
            </div>
        </div>

        <div style="margin-top: 1rem;">
            <p class="card-title">Ganancias</p>
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
                    @if ($reservas->isNotEmpty())
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
                    @else
                    <tr>
                        <td colspan="6">No hay registros</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div style="text-align: right; margin-top: 20px">
                <span style="display: block; font-weight: bold;">Total: {{ $importeReservas }}</span>
            </div>
        </div>

        <div style="margin-top: 1rem; border-top: 1px solid #555; border-bottom: 1px solid #555; padding: 1rem; text-align: center; font-weight: bold; font-size: 1.2rem;">
            <p style="text-align: right; margin-top: 20px; font-weight: bold; font-size: 1.2rem; text-decoration: underline;">
                Uilidad bruta: {{ $importeReservas - $importeCostos }}
            </p>
        </div>
</body>

</html>