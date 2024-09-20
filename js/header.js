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
                        <i class="bi bi-cart-fill"></i><span id="numerito" class="numerito">0</span>
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