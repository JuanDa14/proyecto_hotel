@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
@stop

@section('content')
<div class="container mb-5"> <br>
    <div class="card">

        <div class="card-header text-center ">
            Reporte de Financiero
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
                    <a href="#" id="boton" class="btn btn-success">Generar reporte</a>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-12 col-md-6">
                    <h4 id="importe">Total:</h4>
                </div>
                <div id="imprimir" class="col-12 col-md-6 gap-2" style="display: none;">
                    <form action="{{url('imprimir/financiero')}}" class="d-flex justify-content-end" method="POST" id="form">
                        @csrf
                        <input type="hidden" name="año" id="añoh">
                        <input type="hidden" name="mes" id="mesh">
                        <button type="submit" class="btn btn-primary mr-3">Imprimir Reporte</button>
                        <button type="button" class="btn btn-danger d-flex justify-content-end" id="limpiar" style="display: none;">
                            Limpiar
                        </button>
                    </form>
                </div>
            </div>

            <table class="table table-light mt-1" id="tabla">
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
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const boton = document.querySelector('#boton');

    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre']

    document.addEventListener('DOMContentLoaded', () => {
        const mesActual = document.getElementById('titulo');
        const mes = new Date().getMonth();
        mesActual.textContent = `Mes actual : ${meses[mes]}`;
    })

    boton.addEventListener('click', (e) => {
        e.preventDefault();

        const año = document.querySelector('#año').value;
        const mes = document.querySelector('#mes').value;
        const añoh = document.querySelector('#añoh');
        const mesh = document.querySelector('#mesh');
        const titulo = document.querySelector('#titulo');
        const importe = document.querySelector('#importe');
        const tabla = document.querySelector('#tabla');
        const tbody = document.querySelector('#tabla tbody');
        const form = document.querySelector('#form');
        const imprimir = document.querySelector('#imprimir');
        const limpiar = document.querySelector('#limpiar');

        let importeTotal = 0;

        if (año == '' || mes == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debe ingresar un año y un mes',
            })
        } else {
            añoh.value = año;
            mesh.value = mes;
            titulo.innerHTML = `Reporte del mes de ${meses[mes-1]} del año ${año}`;
            tabla.classList.remove('d-none');
        }

        const options = {
            style: 'currency',
            currency: 'PEN',
        }


        // <td>${financiero.proveedor}</td>
        // <td>${financiero.fechapedido}</td>
        // <td>${financiero.fechaentrega}</td>

        fetch(`/reporte/financiero/${año}/${mes}`)
            .then(res => res.json())
            .then(data => {
                console.log(data);
                let html = '';
                data.forEach((financiero, index) => {
                    html += `
                    <tr>
                        <td>${financiero.producto}</td>
                        <td>${financiero.cantidad}</td>
                        <td>${financiero.totalactivo}</td>
                        <td>${meses[new Date(financiero.fechapedido).getMonth()]}</td>
                        <td>${new Date(financiero.fechapedido).getFullYear()}</td>
                    </tr>
                    `;
                    importeTotal += parseInt(financiero.total);
                });
                tbody.innerHTML = html;
                let formatter = new Intl.NumberFormat('es-PE', options);
                importeTotal = formatter.format(importeTotal);
                importe.innerHTML = `Total: ${importeTotal}`;
                imprimir.style.display = 'block';
            }).catch(err => {
                console.log(err);
            })

    })

    const limpiar = document.querySelector('#limpiar');

    limpiar.addEventListener('click', (e) => {
        e.preventDefault();
        const titulo = document.querySelector('#titulo');
        const importe = document.querySelector('#importe');
        const tabla = document.querySelector('#tabla');
        const tbody = document.querySelector('#tabla tbody');
        const form = document.querySelector('#form');
        const imprimir = document.querySelector('#imprimir');
        const limpiar = document.querySelector('#limpiar');

        titulo.innerHTML = `Mes actual : ${meses[new Date().getMonth()]}`;
        importe.innerHTML = `Total: `;
        tabla.innerHTML = `
        <thead class="thead-light text-center">
            <tr>
                <th>Activo</th>
                <th>Cantidad</th>
                <th>Total activo</th>
                <th>Mes</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        `;
        imprimir.style.display = 'none';
    })
</script>
@endsection