import { useState } from "react";
import { useNavigate } from "react-router-dom";
import authService from "../../services/authServices";

const Login = () => {
  const [cedulaCliente, setCedulaCliente] = useState("");
  const [passwordCliente, setPasswordCliente] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError("");

    try {
      const response = await authService.login(cedulaCliente, passwordCliente);
      if (response.token) {
        localStorage.setItem("token", response.token);
        navigate("/dashboard");
      }
    } catch (err) {
      setError("Usuario o contraseña incorrectos");
    }
  };

  return (
    <div className="container mt-5">
      <div className="row justify-content-center">
        <div className="col-md-4">
          <h2 className="text-center">Iniciar Sesión</h2>
          {error && <div className="alert alert-danger">{error}</div>}
          <form onSubmit={handleSubmit}>
            <div className="mb-3">
              <label className="form-label">Usuario</label>
              <input
                type="text"
                className="form-control"
                value={cedulaCliente}
                onChange={(e) => setCedulaCliente(e.target.value)}
                required
              />
            </div>
            <div className="mb-3">
              <label className="form-label">Contraseña</label>
              <input
                type="password"
                className="form-control"
                value={passwordCliente}
                onChange={(e) => setPasswordCliente(e.target.value)}
                required
              />
            </div>
            <button type="submit" className="btn btn-primary w-100">
              Ingresar
            </button>
          </form>
          <div className="mt-3 text-center">
            <a href="/recuperar">¿Olvidaste tu contraseña?</a>
          </div>
          <div className="mt-2 text-center">
            ¿No tienes cuenta? <a href="/registro">Regístrate aquí</a>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Login;
