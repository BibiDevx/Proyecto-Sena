import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import { Carousel } from "react-bootstrap";

const products = [
  {
    id: 1,
    name: "Tarjeta Gráfica RTX 4070",
    price: 3500000,
    image: "https://via.placeholder.com/150"
  },
  {
    id: 2,
    name: "Procesador Ryzen 7 7800X3D",
    price: 2800000,
    image: "https://via.placeholder.com/150"
  },
  {
    id: 3,
    name: "Placa Madre MSI B550",
    price: 1200000,
    image: "https://via.placeholder.com/150"
  }
];

const newProducts = [
  {
    id: 4,
    name: "Monitor Gaming 144Hz",
    price: 900000,
    image: "https://via.placeholder.com/150"
  },
  {
    id: 5,
    name: "Memoria RAM 32GB DDR5",
    price: 600000,
    image: "https://via.placeholder.com/150"
  }
];

const news = [
  { title: "Nueva generación de procesadores Intel", content: "Intel lanza su serie 14 para competir con AMD." },
  { title: "RTX 5000 en camino", content: "Nvidia anuncia su nueva generación de tarjetas gráficas." }
];

const ProductCard = ({ product }) => {
  return (
    <div className="col">
      <div className="card shadow-sm">
        <img src={product.image} alt={product.name} className="card-img-top" />
        <div className="card-body">
          <h5 className="card-title">{product.name}</h5>
          <p className="card-text">${product.price.toLocaleString()}</p>
          <div className="d-flex justify-content-between align-items-center">
            <a href={`/info/${product.id}`} className="btn btn-primary">Info</a>
            <button className="btn btn-outline-primary">Agregar</button>
          </div>
        </div>
      </div>
    </div>
  );
};

const HomePage = () => {
  return (
    <div>
      {/* Slider */}
      <Carousel className="mt-3" interval={5000}>
        <Carousel.Item>
          <img className="d-block w-100" src="https://via.placeholder.com/1200x400" alt="Oferta 1" />
          <Carousel.Caption>
            <h3>¡Grandes Descuentos en Tarjetas Gráficas!</h3>
            <p>Aprovecha las ofertas en la serie RTX 4000.</p>
          </Carousel.Caption>
        </Carousel.Item>
        <Carousel.Item>
          <img className="d-block w-100" src="https://via.placeholder.com/1200x400" alt="Oferta 2" />
          <Carousel.Caption>
            <h3>Procesadores de Última Generación</h3>
            <p>Consigue los nuevos Ryzen y Intel con descuento especial.</p>
          </Carousel.Caption>
        </Carousel.Item>
        <Carousel.Item>
          <img className="d-block w-100" src="https://via.placeholder.com/1200x400" alt="Oferta 3" />
          <Carousel.Caption>
            <h3>¡Actualiza tu PC ahora!</h3>
            <p>Componentes de alta calidad para mejorar tu experiencia gaming.</p>
          </Carousel.Caption>
        </Carousel.Item>
      </Carousel>

      {/* Productos Nuevos */}
      <div className="container mt-4">
        <h2 className="text-center">Productos Nuevos</h2>
        <div className="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          {newProducts.map((product) => (
            <ProductCard key={product.id} product={product} />
          ))}
        </div>
      </div>

      {/* Productos Destacados */}
      <div className="container mt-4">
        <h2 className="text-center">Productos Destacados</h2>
        <div className="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          {products.map((product) => (
            <ProductCard key={product.id} product={product} />
          ))}
        </div>
      </div>

      {/* Noticias */}
      <div className="container mt-4">
        <h2 className="text-center">Últimas Noticias</h2>
        <div className="row">
          {news.map((item, index) => (
            <div key={index} className="col-md-6">
              <div className="p-3 border rounded bg-light">
                <h5>{item.title}</h5>
                <p>{item.content}</p>
              </div>
            </div>
          ))}
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-dark text-light text-center p-3 mt-4">
        <p>© 2025 PC Componentes | Todos los derechos reservados</p>
      </footer>
    </div>
  );
};

export default HomePage;
