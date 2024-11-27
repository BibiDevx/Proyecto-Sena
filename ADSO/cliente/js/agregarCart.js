function addProducto(idProducto,token){
    let url='../clases/carrito.php'
    let formData= new FormData()
    formData.append('idProducto', idProducto)
    formData.append('token', token)

    fetch(url, {
    method: 'POST',
    body: formData,
    mode: 'cors'
    }).then(reponse => reponse.json())
    .then(data=>{
    if (data.ok) {
        let elemento=document.getElementById("num_cart")
        elemento.innerHTML=data.numero
    }
    })
}