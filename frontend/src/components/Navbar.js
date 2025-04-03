import { Link, useLocation } from "react-router-dom";

function Navbar() {
  const location = useLocation();
  const enModoPrueba = location.pathname.startsWith("/admin/prueba");
  const basePath = enModoPrueba ? "/admin/prueba" : "";

  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
      <div className="container">
        <Link to={`${basePath}/`} className="navbar-brand">
          <strong>Hastechno</strong>
        </Link>
        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarHeader"
          aria-controls="navbarHeader"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>

        <div className="collapse navbar-collapse" id="navbarHeader">
          <ul className="navbar-nav me-auto mb-2 mb-lg-0">
            <li className="nav-item">
              <Link to={`${basePath}/`} className="nav-link">Inicio</Link>
            </li>
            <li className="nav-item">
              <Link to={`${basePath}/productos`} className="nav-link">Productos</Link>
            </li>
            <li className="nav-item">
              <Link to={`${basePath}/marcas`} className="nav-link">Marcas</Link>
            </li>
          </ul>

          {/* Carrito de compras */}
          <Link to={`${basePath}/checkout`} className="btn btn-success me-3 btn-sm">
            <i className="bi bi-cart-fill">
              <span id="num_cart" className="badge bg-secondary">0</span>
            </i>
          </Link>

          {/* Botón de Login */}
          <Link to={`${basePath}/login`} className="btn btn-success btn-sm">
            <i className="bi bi-person-circle"> Login</i>
          </Link>
        </div>
      </div>
    </nav>
  );
}

export default Navbar;
