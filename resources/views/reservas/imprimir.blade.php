<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Reporte de Reserva</title>
</head>

<body style="background-color: #eee;">
  <div  style="margin: 6rem; border: 1px solid #555; border-radius: 20px; padding: 1rem">

    <div>
      <h1 style="text-align: center; font-weight: bold; text-decoration: underline; margin-bottom: 2rem;">
        Reserva Electrónica
      </h1>
    </div>

      <div style="max-width: 16rem; margin-top: rem; display: inline-block;">
        <span style="display: block;">Hotel San Jose S.A.C</span>
        <span style="display: block; max-width: 80%;">Centro Lima Av. Bolivia 148 
        -1191</span>
        <span style="display: block;"> <b>Tel.</b> 837499288</span>
      </div>

      <div style=" display: inline-block;">
        <h1>Hotel San Jose</h1>        
        <span style="display: block;margin-top:-1rem; ">R.U.C. {{ $idreserva * 365249 }}</h5>
      </div>


      
        <div style="width: 50%; display: inline-block;">
          <h3 style="margin:1">Numero de reserva <br> {{ $idreserva }}</h3>
        </div>
        <div style=" display: inline-block;">
          <h3 style="margin:1">
            <b>Fecha </b> <br> 
            {{ date('d-m-y', strtotime($reserva->created_at)) }}
          </h3>
        </div>
    

    <div style="width: 50%; display: inline-block;">
      <h3 style="margin:0">Cliente </h3>
      <label>{{ $cliente }}</label>
    </div>

    <div style="display: inline-block;">
      <h3 style="margin:0">Vendedor</h3>
      <label>
        {{ $vendedor->nombre }} {{ $vendedor->apellidos }} 
      </label>
    </div>


 

  <div style="margin-top: 1rem;">
    <table class="table table-light" style="text-align: center; border: solid 1px; width: 100%">
      <thead class="thead-light">
        <tr>
          <th>Habitacion</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Importe x Producto</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($ArrayHabitaciones); $i++) <tr>
          <td>{{ $ArrayHabitaciones[$i] }}</td>
          <td>{{ $Arraycantidades[$i] }}</td>
          <td>{{ $ArrayPrecio[$i] }}</td>
          <td>S/{{ $ArrayImporte[$i] }}</td>
          </tr>
          @endfor
      </tbody>
    </table>
    <div style="text-align: right; margin-top: 20px">
      <label>Importe Total : S/{{ $importeTotal }}</label>
    </div>
  </div>
  </div>
</body>

</html>