import React, { useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";

const products = [
  { id: 1, name: "Tarjeta Gráfica", category: "Hardware", price: 2500000, image: "https://via.placeholder.com/150" },
  { id: 2, name: "Procesador Ryzen", category: "Hardware", price: 1800000, image: "https://via.placeholder.com/150" },
  { id: 3, name: "Teclado Mecánico", category: "Periféricos", price: 350000, image: "https://via.placeholder.com/150" },
  { id: 4, name: "Monitor 144Hz", category: "Periféricos", price: 900000, image: "https://via.placeholder.com/150" }
];

const categories = ["Todos", "Hardware", "Periféricos","Monitores"];

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

const ProductList = () => {
  const [selectedCategory, setSelectedCategory] = useState("Todos");

  const filteredProducts =
    selectedCategory === "Todos"
      ? products
      : products.filter((product) => product.category === selectedCategory);

  return (
    <div className="container mt-4">
      <div className="row">
        {/* Filtros */}
        <div className="col-md-3">
          <h5>Categoría</h5>
          <ul className="list-group">
            {categories.map((category) => (
              <li
                key={category}
                className={`list-group-item ${selectedCategory === category ? "active" : ""}`}
                onClick={() => setSelectedCategory(category)}
                style={{ cursor: "pointer" }}
              >
                {category}
              </li>
            ))}
          </ul>
        </div>

        {/* Productos */}
        <div className="col-md-9">
          <div className="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            {filteredProducts.map((product) => (
              <ProductCard key={product.id} product={product} />
            ))}
          </div>
        </div>
      </div>
    </div>
  );
};

export default ProductList;
