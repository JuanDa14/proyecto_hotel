
@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
@stop

@section('content')
<div class="container mb-5"> <br>
            <div class="card m-5 "> 
                
            <div class="card-header text-center ">
            Reporte de Ventas
            </div>
            <div class="card-body">

                <h5 id="titulo">Mes actual : </h5>

                    <div class="row">
                        <div class="text-left col-4">
                            <input type="number" maxlength="4" class="form-control " id="año" placeholder="Año">
                        </div>

                        <div class="text-left col-4">
                            <select id="mes" class="form-control">
                                <option value="0">Seleccione un mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Juni</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setiembre</option>
                                <option value="10">Obtubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>

                        <div class=" col-4">
                            <a href="#" id="boton" class="btn btn-success">Generar reporte de ventas</a> 
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h4 id="importe">Importe Total:</h4>
                    </div>
                    <div id="ver">
                        <form action="{{route('imprimirRM')}}" method="post" id="form">
                        @csrf
                        <input type="hidden" name="año" id="añoh">
                        <input type="hidden" name="mes" id="mesh">
                        
                        </form>
                    </div>

                <table class="table table-light mt-1" id="tabla">
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
                        

                    </tbody>
                </table>
            </div>    
        </div>
        </div>

@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/domLoaded.js"></script>

    <script>
        const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        const fecha = new Date();
        const mes1 = fecha.getMonth()+1;
         document.getElementById('titulo').innerHTML += meses[mes1-1];
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
                 type: "get",
                 url: 'api/obtenerVentas/'+parseInt(año)+'/'+parseInt(mes),
                 success: function (datos) {
                     if (datos.length ==0) {
                        $('#tabla td').remove();
                        document.getElementById('importe').innerHTML = 'Importe Total:';
                        $('#ver a').remove();
                        return Swal.fire(
                        'Hubo un problema!',
                        'No se encontraron ventas realizadas en este mes',
                        'info')  
                     }
                     $('#tabla td').remove();
                     document.getElementById('importe').innerHTML = 'Importe Total:';
                     $('#ver a').remove();
                     var suma = 0.0;
                     for (let i = 0; i < datos.length; i++) {
                         
                         const id = datos[i].id;
                         const empleado = datos[i].empleado;
                         const cliente = datos[i].cliente;
                         const producto = datos[i].producto;
                         const precio = datos[i].precio;
                         const cantidad = datos[i].cantidad;
                         const importe = parseFloat(datos[i].importe);

                         suma = suma + importe;
                         const fila = '<tr><td>'+id+'</td><td>'+empleado+'</td><td>'+cliente+'</td><td>'+producto+'</td><td>'+precio+'</td><td>'+cantidad+'</td><td>'+importe+'</td><td>'+año+'</td><td>'+meses[mes-1]+'</td></tr>'
                         document.getElementById('tabla').innerHTML += fila;
                     }
                     $('#añoh').val(año);
                     $('#mesh').val(mes);
                     $('#form').append('<button type="submit" class="btn btn-warning">Imprimir reporte</button>');
                     document.getElementById('importe').innerHTML += 'S/.'+suma;

              

                 }
             });
             $('#año').val('');
             $('#mes').val('0');
             


        });

        
    </script>
@endsection