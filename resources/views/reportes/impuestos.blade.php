@extends('adminlte::page')

@section('title', 'Impuestos')

@section('content_header')

@stop

@section('content')

<div class="container mb-5"> <br>
    <div class="card m-5 "> 
        
    <div class="card-header text-center ">
    Reporte de Impuestos pagados
    </div>
    <div class="card-body">

        <h5 id="titulo">Fecha : </h5>

            <div class="row">
                <div class="text-left col-4">
                    <input type="number" maxlength="4" class="form-control " id="año" placeholder="Año">
                </div>

                <div class=" col-4">
                    <a href="#" id="boton" class="btn btn-success">Generar reporte de impuestos</a> 
                </div>
            </div>
            <div class="row mt-5">
                <h5 id="importe">Importe Total : </h5>
            </div>

        <table class="table table-light mt-1" id="tabla">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Dni del contador</th>
                    <th>Contador</th>
                    <th>Fecha de pago</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="alert alert-success mt-5" id="mensaje" role="alert" hidden>
            <label>Reporte de insumos comprados</label>
        </div>
        <div class="alert alert-danger mt-5" id="mensaje2" role="alert" hidden>
            <label>No se encontraron datos en esta fecha</label>
        </div>
    </div>    
</div>
</div>
@stop
@section('js')
<script src="/js/domLoaded.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    const fecha = new Date();
    const mes1 = fecha.getMonth()+1;
    const año  = fecha.getDate();
         document.getElementById('titulo').textContent = `Fecha : ${meses[mes1-1]} del 20${año+1}`

    $('#boton').click(function (e) { 
    const año = $('#año').val();
    const mes = $('#mes').val();
    if (año=='' || mes==0) {
        return Swal.fire(
                'Hubo un error!',
                'Aún hay campos vacios',
                'error')     

    }
     $.ajax({
         type: "GET",
         url: '/reporteImpuesto/'+año+'',
         success: function (datos) {
             if (datos.length ==0) {
                $('#tabla td').remove();
                document.getElementById('importe').innerHTML = 'Importe Total:';
                 return Swal.fire(
                'Hubo un problema!',
                'No se encontraron registros en la fecha establecida',
                'info')     
             }
             $('#tabla td').remove();
             document.getElementById('importe').innerHTML = 'Importe Total:';

             var suma = 0.0;
             for (let i = 0; i < datos.length; i++) {                 
                 const id = datos[i].id;
                 const dnicontador = datos[i].dni;
                 const contador = datos[i].contador;
                 const fecha = datos[i].fecha;
                 const monto = datos[i].monto;
                 
                 suma = suma + parseFloat(monto);
                 
                 const fila = '<tr><td>'+id+'</td><td>'+dnicontador+'</td><td>'+contador+'</td><td>'+fecha+'</td><td>'+monto+'</td></tr>'
                 document.getElementById('tabla').innerHTML += fila;
             }             
             
             document.getElementById('importe').innerHTML += 'S/.'+suma.toFixed(2);
         }
     });
     $('#año').val('');
     $('#mes').val('0');
});


</script>
@endsection