
@extends('adminlte::page')

@section('title', 'Empleado | Mes')

@section('content_header')
@stop

@section('content')
    <div class="container"> <br>
            <div class="card"> 
                
            <p class=" h5 card-header text-center">
            Mesero con más ventas
            </p>
            <div class="card-body">

                    <div class="row">
                        <div class="text-left col-4">
                            <input type="number" maxlength="4" class="form-control " id="año" placeholder="Año" >
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
                            <a href="#" id="boton" class="btn btn-primary"> Obtener empleado con más ventas</a> 
                        </div>
                    </div>

                <table class="table table-light mt-3 text-center" id="tabla">
                    <thead class="thead-light">
                        <tr>
                            <th>Empleado</th>
                            <th>Cantidad Vendida</th>
                            <th>Año</th>
                            <th>Mes</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="alert alert-success mt-5" id="mensaje" role="alert" hidden>
                    <label>Mesero con más ventas realizadas encontrado</label>
                </div>
                <div class="alert alert-danger mt-5" id="mensaje2" role="alert" hidden>
                    <label>No se encontraron Meseros en esta fecha</label>
                </div>
            </div>
            <div class="card-footer text-muted">
            Mesero con más ventas
            </div>
            
        </div>
    </div>

    
    {{-- <a class="btn btn-primary" href="{{route('prueba',['año'=>1,'mes'=>2])}}" >enviar</a> --}}
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/domLoaded.js"></script>   
    <script>


        const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        $('#boton').click(function (e) { 
           
            const a = document.getElementById('año').value;
            const m = document.getElementById('mes').value;
            
            if (parseInt(a) <=0 || m==0  || a =="") {
                return Swal.fire(
                'Hubo un error!',
                'Aún hay campos vacios',
                'error')     
            }
            $('#tabla td').remove();
           
            $.ajax({
                type: "GET",
                url: '/api/ObtenerDescuento/'+parseInt(a)+'/'+parseInt(m),
                success: function (data) {
                    
                    if (data.length > 0) {
                            for (let i = 0; i < data.length; i++) {
                            const empleado = data[i].empleado;
                            const num = data[i].num_ventas;
                            const fila = '<tr id="fila0"><td>'+empleado+'</td><td>'+num+'</td><td>'+a+'</td><td>'+meses[m-1]+'</td></tr>'
                            document.getElementById('tabla').innerHTML += fila;
                            document.getElementById('año').value = '';
                            document.getElementById('mes').value = '0';
                            $('#mensaje').removeAttr("hidden");
                            verMensaje();
            
                            
                        }
                    } else {
                        $('#mensaje2').removeAttr("hidden");
                        verMensaje();
                        document.getElementById('año').value = '';
                        document.getElementById('mes').value = '0';
                    
                    }
                    
                    
                }
            });
        });

 
        function verMensaje() {
            setTimeout(function(){
                $('#mensaje').attr("hidden", "hidden");
                $('#mensaje2').attr("hidden", "hidden");
            }, 4000);
        };  
            


    </script>
@endsection

