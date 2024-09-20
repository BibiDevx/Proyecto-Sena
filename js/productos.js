//Productos Json
const productos = [
    //Procesador
    {
        id:"cpu-01",
        titulo:"Procesador AMD 5700X",
        imagen:"./img/cpu.png",
        categoria: {
            nombre:"Procesadores",
            id:"procesadores"
        },
        precio:760000
    },
    {
        id:"cpu-02",
        titulo:"Procesador AMD 7600G",
        imagen:"./img/cpu.png",
        categoria: {
            nombre:"Procesadores",
            id:"procesadores"
        },
        precio:860000
    },
    {
        id:"cpu-03",
        titulo:"Procesador AMD 8500G",
        imagen:"./img/cpu.png",
        categoria: {
            nombre:"Procesadores",
            id:"procesadores"
        },
        precio:960000
    },
    {
        id:"cpu-04",
        titulo:"Procesador AMD 5600G",
        imagen:"./img/cpu.png",
        categoria: {
            nombre:"Procesadores",
            id:"procesadores"
        },
        precio:560000
    },//Gabinetes
    {
        id:"gabinete-01",
        titulo:"CAJA ATX COOLER MASTER BOX MB511",
        imagen:"./img/caja.png",
        categoria: {
            nombre:"Gabinete",
            id:"gabinetes"
        },
        precio:479000
    },
    {
        id:"gabinete-02",
        titulo:"Procesador AMD 5600G",
        imagen:"./img/caja.png",
        categoria: {
            nombre:"Gabinete",
            id:"gabinetes"
        },
        precio:589000
    }
];
    
const contenedorProductos = document.querySelector("#contenedor-productos");
const botonesCategorias = document.querySelectorAll(".boton-categoria");
const tituloPrincipal= document.querySelector("#titulo-principal");
let botonesAgregar= document.querySelectorAll(".producto-agregar");
const numerito= document.querySelector("#numerito");


function cargarProductos(productosElegidos){

    contenedorProductos.innerHTML="";

    productosElegidos.forEach(producto => {
        const div = document.createElement("div");
        div.classList.add("producto");
        div.innerHTML=`
        <img class="producto-imagen" src="${producto.imagen}" alt="${producto.titulo}">
        <div class="producto-detalles">
            <h3 class="producto-titulo">${producto.titulo}</h3>
            <p class="producto-precio">$${producto.precio}</p>
            <div class="botones-producto">
                <button class="producto-agregar" id="${producto.id}"><i class="bi bi-cart-plus-fill"></i></button>
                <button class="detalles-producto"><a href="detalles.html">Info</a></button>
            </div>
        </div>
    `;
    
    contenedorProductos.append(div);
    })
    actualizarBotonesAgregar();
}

cargarProductos(productos);

/*
<div class="producto">
    <img class="producto-imagen" src="./img/cpu.png" alt="">
    <div class="producto-detalles">
        <h3 class="producto-titulo">Procesador AMD 5600G</h3>
        <p class="producto-precio">560.000</p>
        <div class="botones-producto">
            <button class="producto-agregar"><i class="bi bi-cart-plus-fill"></i></button>
            <button class="detalles-producto"><a href="detalles.html">Info</a></button>
        </div>
    </div>
</div>
*/
botonesCategorias.forEach(boton => {
    boton.addEventListener("click",(e)=> {

        botonesCategorias.forEach(boton => boton.classList.remove("active"));
        e.currentTarget.classList.add("active");
        if(e.currentTarget.id !="todos"){
            const productoCategoria = productos.find(producto => producto.categoria.id===e.currentTarget.id);
            tituloPrincipal.innerText= productoCategoria.categoria.nombre;

            const productosBoton = productos.filter(producto => producto.categoria.id===e.currentTarget.id);
            cargarProductos(productosBoton);
        }else{
            tituloPrincipal.innerText= "Todos los Productos";
            cargarProductos(productos);
        }
    })
});

function actualizarBotonesAgregar() {
    botonesAgregar= document.querySelectorAll(".producto-agregar");

    botonesAgregar.forEach(boton => {
        boton.addEventListener("click",agregarAlCarrito);     
    });
}

let productosEnCarrito;
let productosEnCarritoLS=localStorage.getItem("productos-en-carrito");

if(productosEnCarritoLS){
    productosEnCarrito = JSON.parse(productosEnCarritoLS);
    actualizarNumerito();
}else{
    productosEnCarrito=[];
}


function agregarAlCarrito(e) {
    const idBoton = e.currentTarget.id;
    const productoAgregado = productos.find(producto => producto.id===idBoton);

    if(productosEnCarrito.some(producto=>producto.id===idBoton)){
       const index =productosEnCarrito.findIndex(producto=>producto.id===idBoton);
       productosEnCarrito[index].cantidad++;
    }else{
        productoAgregado.cantidad=1;
        productosEnCarrito.push(productoAgregado);
    }
    actualizarNumerito();
    
    localStorage.setItem("productos-en-carrito",JSON.stringify(productosEnCarrito));
}

function actualizarNumerito() {
    let nuevoNumerito=productosEnCarrito.reduce((acc,producto)=>acc + producto.cantidad,0);
    numerito.innerText= nuevoNumerito;  
    
}