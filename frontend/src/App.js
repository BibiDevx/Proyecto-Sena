import { BrowserRouter as Router, Routes, Route, useLocation } from "react-router-dom";
import ClienteRoutes from "./routes/ClienteRoutes";
import AdminRoutes from "./routes/AdminRoutes";
import Navbar from "./components/Navbar";
import Perfil from "./components/Perfil";
import SidebarAdmin from "./components/SidebarAdmin";

function App() {
  return (
    <Router>
      <MainLayout />
    </Router>
  );
}

function MainLayout() {
  const location = useLocation();
  const isAdminRoute = location.pathname.startsWith("/admin");
  const isTestView = location.pathname.startsWith("/admin/prueba"); // Detecta la vista de prueba

  return (
    <div className="d-flex">
      {isAdminRoute && !isTestView && <SidebarAdmin />} {/* Sidebar solo en admin normal */}
      <div className="flex-grow-1">
        {!isAdminRoute || isTestView ? <Navbar /> : null} {/* Navbar visible en cliente y en prueba */}
        <Routes>
          <Route path="/*" element={<ClienteRoutes />} />
          <Route path="/perfil" element={<Perfil />} />
          <Route path="/admin/*" element={<AdminRoutes />} />
        </Routes>
      </div>
    </div>
  );
}
    

export default App;