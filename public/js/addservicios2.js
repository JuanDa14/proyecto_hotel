
let lista = []
let idServicio = ""
let descServicio = ""
let indice = 0

const serv = document.getElementById('serv')
const input_nro = document.getElementById('nro')
const input_nroa = document.getElementById('nroa')

serv.addEventListener('change', () => {
    let data = serv.value.split('_')
    idServicio = data[0]
    descServicio = data[1]
})

const funServicio = () => {

    console.log('click');

    if (idServicio !== "") {
        
        let table = document.getElementById('body')
        
        let row = `<tr id="fila${indice}">
                    <td>
                        <input type="text" name="servicios[]" value="${ idServicio }" hidden>
                        <label id="lb${indice}">${ idServicio }</label>
                    </td>
                    <td>
                        <label>${ descServicio }</label>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="removeRow(${indice}, ${idServicio})">X</button>
                    </td>
        `
        indice++

        if (!duplicate(idServicio)) {
            table.innerHTML+=row
        } else {
            Swal.fire({
                type: 'error',
                icon: 'error',
                text: 'El servicio ya está agregado!'
            })
        }

        lista.push({
            key: idServicio
        })

    } else {
        Swal.fire({
            type: 'error',
            icon: 'error',
            text: 'Seleccione por lo menos un servicio adicional!'
        })
    }

}

const removeRow = (i, id) => {
    document.getElementById('fila'+i).remove()
    lista = lista.filter(item => item.key != id)
}

const duplicate = (id) => {
    let bool = false

    lista.forEach(item => {
        if (item.key == id) {
            bool = true
        }
    })

    return bool
}

const btnAdd = document.getElementById('addservicio')
btnAdd.addEventListener('click', funServicio)