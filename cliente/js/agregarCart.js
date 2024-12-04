function addProducto(idProducto, token) {
  let url = "../clases/carrito.php";
  let formData = new FormData();
  formData.append("idProducto", idProducto);
  formData.append("token", token);

  fetch(url, {
    method: "POST",
    body: formData,
    mode: "cors",
  })
    .then((reponse) => reponse.json())
    .then((data) => {
      if (data.ok) {
        let elemento = document.getElementById("num_cart");
        elemento.innerHTML = data.numero;
      }
    });
}
function eliminar() {
  let botonElimina = document.getElementById("btn-elimina");
  let idProducto = botonElimina.value;

  let url = "../clases/actualizar_carrito.php";
  let formData = new FormData();
  formData.append("action", "eliminar");
  formData.append("idProducto", idProducto);

  fetch(url, {
    method: "POST",
    body: formData,
    mode: "cors",
  })
    .then((reponse) => reponse.json())
    .then((data) => {
      if (data.ok) {
        location.reload();
      }
    });
}
