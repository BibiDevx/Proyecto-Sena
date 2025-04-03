import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";

const brands = [
  { id: 1, name: "MSI", logo: "https://via.placeholder.com/150", link: "/productos/msi" },
  { id: 2, name: "Kingston", logo: "https://via.placeholder.com/150", link: "/productos/kingston" },
  { id: 3, name: "ASUS", logo: "https://via.placeholder.com/150", link: "/productos/asus" },
  { id: 4, name: "Gigabyte", logo: "https://via.placeholder.com/150", link: "/productos/gigabyte" },
  { id: 5, name: "Corsair", logo: "https://via.placeholder.com/150", link: "/productos/corsair" }
];

const BrandCard = ({ brand }) => {
  return (
    <div className="col">
      <div className="card shadow-sm text-center">
        <img src={brand.logo} alt={brand.name} className="card-img-top p-3" />
        <div className="card-body">
          <h5 className="card-title">{brand.name}</h5>
          <a href={brand.link} className="btn btn-primary">Ver Productos</a>
        </div>
      </div>
    </div>
  );
};

const BrandsPage = () => {
  return (
    <div className="container mt-4">
      <h2 className="text-center mb-4">Nuestras Marcas</h2>
      <div className="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        {brands.map((brand) => (
          <BrandCard key={brand.id} brand={brand} />
        ))}
      </div>
    </div>
  );
};

export default BrandsPage;
