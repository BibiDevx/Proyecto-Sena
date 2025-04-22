import { useEffect, useState } from "react";
import authServices from "../services/authServices";

const Perfil = () => {
  const [user, setUser] = useState(null);
  const [error, setError] = useState("");

  useEffect(() => {
    const fetchProfile = async () => {
      try {
        const data = await authServices.getProfile();
        setUser(data.data); // recuerda que Laravel devuelve dentro de 'data'
      } catch (err) {
        setError("No se pudo obtener el perfil.");
      }
    };

    fetchProfile();
  }, []);

  if (error) {
    return <p className="text-danger">{error}</p>;
  }

  if (!user) {
    return <p>Cargando perfil...</p>;
  }

  return (
    <div className="container mt-4">
      <h3>Perfil del Usuario</h3>
      <ul className="list-group">
        <li className="list-group-item"><strong>Email:</strong> {user.email}</li>
        {user.cliente && (
          <>
            <li className="list-group-item"><strong>Nombre:</strong> {user.cliente.nombreCliente}</li>
            <li className="list-group-item"><strong>Apellido:</strong> {user.cliente.apellidoCliente}</li>
            <li className="list-group-item"><strong>Documento:</strong> {user.cliente.cedulaCliente}</li>
            <li className="list-group-item"><strong>Dirección:</strong> {user.cliente.direccion}</li>
            <li className="list-group-item"><strong>Teléfono:</strong> {user.cliente.telefonoCliente}</li>
          </>
        )}
        {user.admin && (
          <>
            <li className="list-group-item"><strong>Nombre:</strong> {user.admin.nombreAdmin}</li>
            <li className="list-group-item"><strong>Teléfono:</strong> {user.admin.telefonoAdmin}</li>
          </>
        )}
      </ul>
    </div>
  );
};

export default Perfil;