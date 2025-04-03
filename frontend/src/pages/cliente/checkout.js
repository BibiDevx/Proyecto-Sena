import React, { useState } from "react";
import { Modal, Button } from "react-bootstrap";

const Checkout = () => {
  const [cart, setCart] = useState([
    { id: 1, name: "Tarjeta Gráfica RTX 4070", price: 3500000, quantity: 1, image: "https://via.placeholder.com/100" },
    { id: 2, name: "Procesador Ryzen 7 7800X3D", price: 2800000, quantity: 2, image: "https://via.placeholder.com/100" },
  ]);
  const [showModal, setShowModal] = useState(false);
  const [productToDelete, setProductToDelete] = useState(null);
  const userLoggedIn = true;

  const updateQuantity = (id, newQuantity) => {
    setCart(cart.map(item => item.id === id ? { ...item, quantity: newQuantity } : item));
  };

  const removeProduct = () => {
    setCart(cart.filter(item => item.id !== productToDelete));
    setShowModal(false);
  };

  const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);

  return (
    <div className="container mt-4">
      <h2>Checkout</h2>
      <div className="table-responsive">
        <table className="table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              
            </tr>
          </thead>
          <tbody>
            {cart.length === 0 ? (
              <tr><td colSpan="6" className="text-center">Carrito vacío</td></tr>
            ) : (
              cart.map(item => (
                <tr key={item.id}>
                  <td><img src={item.image} alt={item.name} className="img-thumbnail" /></td>
                  <td>{item.name}</td>
                  <td>${item.price.toLocaleString()}</td>
                  <td>
                    <input type="number" value={item.quantity} min="1" onChange={(e) => updateQuantity(item.id, parseInt(e.target.value))} />
                  </td>
                  <td>${(item.price * item.quantity).toLocaleString()}</td>
                  <td>
                    <button className="btn btn-danger" onClick={() => { setProductToDelete(item.id); setShowModal(true); }}>Eliminar</button>
                  </td>
                </tr>
              ))
            )}
          </tbody>
        </table>
      </div>
      <h4 className="text-end">Total: ${total.toLocaleString()}</h4>
      <div className="d-grid gap-2 col-md-5 offset-md-7">
        {userLoggedIn ? (
          <Button variant="primary" size="lg" href="/pago">Realizar pago</Button>
        ) : (
          <Button variant="primary" size="lg" href="/login">Iniciar sesión para pagar</Button>
        )}
      </div>

      {/* Modal para eliminar */}
      <Modal show={showModal} onHide={() => setShowModal(false)}>
        <Modal.Header closeButton>
          <Modal.Title>Alerta</Modal.Title>
        </Modal.Header>
        <Modal.Body>¿Desea eliminar el producto?</Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={() => setShowModal(false)}>Cerrar</Button>
          <Button variant="danger" onClick={removeProduct}>Eliminar</Button>
        </Modal.Footer>
      </Modal>
    </div>
  );
};

export default Checkout;
