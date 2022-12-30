let idServicio = ""
let descServicio = ""
let indice = 0

const serv = document.getElementById('serv')

serv.addEventListener('change', () => {
    let data = serv.value.split('_')
    idServicio = data[0]
    descServicio = data[1]
})

const funServicio = () => {
    let table = document.getElementById('body')
    
    let row = `<tr id="fila${indice}">
                <td>
                    <input type="text" name="servicios[]" value="${ idServicio }" hidden>
                    <label>${ idServicio }</label>
                </td>
                <td>
                    <label>${ descServicio }</label>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="removeRow(${indice})">X</button>
                </td>
    `
    indice++

    table.innerHTML+=row
}

const removeRow = (i) => {
    document.getElementById('fila'+i).remove()
}

const btnAdd = document.getElementById('addservicio')
btnAdd.addEventListener('click', funServicio)