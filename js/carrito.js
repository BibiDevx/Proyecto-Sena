const header= document.querySelector("header");
const footer= document.querySelector("footer");

header.innerHTML =`
    <!--<input type="checkbox" name="" id="check">-->
        <nav class="navContainer">
            <div class="icono">Hastechno</div>
            <ul>
                <div class="boxSearch">
                    <input type="search" placeholder="Buscar" name="" id="" class="buscar">
                    <i class="bi bi-search lupita"></i>
                </div>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="productos.html">Productos</a></li>
                <li><a href="">Marcas</a></li>
                <li><a href="login.html">Login</a></li>
                <div class="cartIcon">
                    <a class="boton-carrito" href="carrito.html">
                        <i class="bi bi-cart-fill"></i><span id="numerito" class="numerito"></span>
                    </a>
                </div>
              </ul>
              <label for="check" class="bar">
                <i class="bi bi-list"></i>
                <i class="bi bi-x"></i>
            </label>
        </nav>
`;

footer.innerHTML =`
    <div class="footer-container">
            <div class="footer-section about">
                <h2>Sobre Nosotros</h2>
                <p>
                    Somos una tienda de hardware especializada en ofrecer los mejores componentes para gamers y entusiastas de la tecnología.
                </p>
            </div>
            <div class="footer-section links">
                <h2>Enlaces Rápidos</h2>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Categorías</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h2>Contacto</h2>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> 123 Calle, Bogota, Colombia</li>
                    <li><i class="fas fa-phone"></i> +123 456 7890</li>
                    <li><i class="fas fa-envelope"></i> info@tiendadehardware.com</li>
                </ul>
            </div>
            <div class="footer-section social">
                <h2>Redes Sociales</h2>
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Tienda de Hardware | Todos los derechos reservados.
        </div>
    </div>
`;


let productosEnCarrito=localStorage.getItem("productos-en-carrito");
productosEnCarrito=JSON.parse(productosEnCarrito);

const contenedorCarritoVacio=document.querySelector("#carrito-vacio");
const contenedorCarritoProductos=document.querySelector("#carrito-productos");
const contenedorCarritoAcciones=document.querySelector("#carrito-acciones");
const contenedorCarritoComprado=document.querySelector("#carrito-comprado");
let botonesEliminar= document.querySelectorAll(".carrito-producto-eliminar");

function cargarProductosCarrito() {
    if(productosEnCarrito){

        contenedorCarritoVacio.classList.add("disabled");
        contenedorCarritoProductos.classList.remove("disabled");
        contenedorCarritoAcciones.classList.remove("disabled");
        contenedorCarritoComprado.classList.add("disabled");
    
        contenedorCarritoProductos.innerHTML="";
    
        productosEnCarrito.forEach(producto => {
            const div=document.createElement("div");
            div.classList.add("carrito-producto");
            div.innerHTML=`
                <img class="carrito-producto-imagen" src="${producto.imagen}" alt="${producto.titulo}" />
                <div class="carrito-producto-titulo">
                    <small>Titulo</small>
                    <h3>${producto.titulo}</h3>
                </div>
                <div class="carrito-producto-cantidad">
                    <small>Cantidad</small>
                    <p>${producto.cantidad}</p>
                </div>
                <div class="carrito-producto-precio">
                    <small>Precio</small>
                    <p>${producto.precio}</p>
                </div>
                <div class="carrito-producto-subtotal">
                    <small>Subtotal</small>
                    <p>${producto.precio * producto.cantidad}</p>
                </div>
                <button id="${producto.id}" class="carrito-producto-eliminar">
                    <i class="bi bi-cart-x-fill"></i>
                </button>
            `;
    
            contenedorCarritoProductos.append(div);
        });
        
    }else{
        contenedorCarritoVacio.classList.remove("disabled");
        contenedorCarritoProductos.classList.add("disabled");
        contenedorCarritoAcciones.classList.add("disabled");
        contenedorCarritoComprado.classList.add("disabled");
    }
    actualizarBotonesEliminar();
}

cargarProductosCarrito();

function actualizarBotonesEliminar() {
    botonesEliminar= document.querySelectorAll(".carrito-producto-eliminar");

    botonesEliminar.forEach(boton => {
        boton.addEventListener("click",eliminarDelCarrito);     
    });
}

function eliminarDelCarrito(e) {
    const idBoton=e.currentTarget.id;
    const index= productosEnCarrito.findIndex(producto=> producto.id===idBoton);
    productoEliminado.splice(index,1);
    cargarProductosCarrito();

    localStorage.setItem("productos-en-carrito",JSON.stringify(productosEnCarrito));
}