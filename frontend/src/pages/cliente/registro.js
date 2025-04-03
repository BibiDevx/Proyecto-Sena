import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";

const RegistroCliente = () => {
  return (
    <div className="container mt-5">
      <div className="row justify-content-center">
        <div className="col-md-6">
          <div className="card shadow p-4">
            <h2 className="text-center mb-4">Registro de Cliente</h2>
            <form>
              <div className="mb-3">
                <label className="form-label">Nombres</label>
                <input type="text" className="form-control" placeholder="Ingrese sus nombres" />
              </div>
              <div className="mb-3">
                <label className="form-label">Apellidos</label>
                <input type="text" className="form-control" placeholder="Ingrese sus apellidos" />
              </div>
              <div className="mb-3">
                <label className="form-label">Número de Identificación</label>
                <input type="number" className="form-control" placeholder="Ingrese su identificación" />
              </div>
              <div className="mb-3">
                <label className="form-label">Correo Electrónico</label>
                <input type="email" className="form-control" placeholder="Ingrese su correo electrónico" />
              </div>
              <div className="mb-3">
                <label className="form-label">Dirección</label>
                <input type="text" className="form-control" placeholder="Ingrese su dirección" />
              </div>
              <div className="mb-3">
                <label className="form-label">Teléfono</label>
                <input type="tel" className="form-control" placeholder="Ingrese su teléfono" />
              </div>
              <div className="mb-3">
                <label className="form-label">Contraseña</label>
                <input type="password" className="form-control" placeholder="Ingrese su contraseña" />
              </div>
              <div className="mb-3">
                <label className="form-label">Repetir Contraseña</label>
                <input type="password" className="form-control" placeholder="Repita su contraseña" />
              </div>
              <div className="d-grid gap-2">
                <button type="submit" className="btn btn-primary">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RegistroCliente;
