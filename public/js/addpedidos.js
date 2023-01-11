
let idProduct = ""
let nombreProduct = ""
let cont = 0
subtotales = []
total = 0
let xlist = []

let inputPrecio = document.getElementById('precio')
let inputCantidad = document.getElementById('cantidad')
let inputTotal = document.getElementById('total')
let spanTotal = document.getElementById('total_span')

let selectProduct = document.getElementById('producto')

selectProduct.addEventListener('change', () => {
    let data = selectProduct.value.split('_')
    idProduct = data[0]
    inputPrecio.value = data[1]
    nombreProduct = data[2]
})


let addButton = document.getElementById('btnadd')
addButton.addEventListener('click', addCart)

function addCart() {
    let txtProduct = idProduct
    let txtPrecio = inputPrecio.value
    let txtCantidad = inputCantidad.value
    
    
    if(inputPrecio.value != "" && inputCantidad.value != "" && parseInt(inputCantidad.value)>0) {
        subtotales[cont] = txtCantidad * txtPrecio
        
        
        let cart = document.getElementById('body')
        
        let row = `<tr id="fila${cont}">
                        <td>
                            <button type="button" class="btn btn-danger" onclick="removeRow(${cont},${idProduct})">X</button>
                        </td>
                        <td>
                            <input value="${txtProduct}" hidden name="ids[]">
                            <input value="${nombreProduct}" disabled>
                        </td>
                        <td>
                            <input value="${txtPrecio}" hidden name="precios[]">
                            <input value="${txtPrecio}" disabled>
                        </td>
                        <td>
                            <input value="${txtCantidad}" hidden name="cantidades[]">
                            <input value="${txtCantidad}" disabled>
                        </td>
                        <td>
                            <input value="${parseFloat(subtotales[cont]).toFixed(2)}" disabled>
                        </td>
                        <td style="display: none;">${parseFloat(subtotales[cont]).toFixed(2)}</td>
                    </tr>`
        
        cont++
        
        if (duplicated(idProduct) != true) {
            cart.innerHTML += row

            calTotal(cont, idProduct)
        } else {
            Swal.fire({
                type: 'error',
                icon: 'error',
                text: 'El producto ya está agregado!'
            })
        }

        
    }
    else {
        Swal.fire({
            type: 'error',
            icon: 'error',
            text: 'Completa todos los campos!'
        })
    }
    
}

function removeRow(i, idp) {
    document.getElementById('fila'+i).remove()
    xlist = xlist.filter(item => item.id != idp)
    
    total = 0
    xlist.forEach(ix => {
        total += ix.key
    })
    inputTotal.value = parseFloat(total).toFixed(2)
    spanTotal.innerText = parseFloat(total).toFixed(2)
}


function calTotal(i, id) {
    let to = document.getElementById('fila'+(i-1))
    let item = { "id": id ,"key": parseFloat(to.getElementsByTagName("td")[5].innerHTML) }
    
    xlist.push(item)
    total = 0
    xlist.forEach(i => {
        total += i.key
    })
    
    inputTotal.value = parseFloat(total).toFixed(2)
    spanTotal.innerText = parseFloat(total).toFixed(2)
}

function duplicated(id) {
    let bol = false

    xlist.forEach(item => {
        console.log(item.id)
        if (item.id == id) {
            bol = true
        }
    })
    return bol
}