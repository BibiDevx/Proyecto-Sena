// src/services/authServices.js
import axios from "axios";

const API_URL = "http://localhost:8000/api/auth"; // Asegúrate de que coincide con tu backend

const login = async (email, password) => {
  const response = await axios.post(`${API_URL}/login`, {
    email,
    password,
  });

  // ✅ Guardar token JWT en localStorage
  const token = response.data.data.access_token;
  localStorage.setItem("token", token);

  // También podrías guardar info del usuario si lo necesitas
  localStorage.setItem("user", JSON.stringify(response.data.data.user));

  return response.data;
};

const logout = async () => {
  const token = localStorage.getItem("token");
  if (!token) return;

  await axios.post(`${API_URL}/logout`, {}, {
    headers: {
      Authorization: `Bearer ${token}`,
    },
  });

  localStorage.removeItem("token");
  localStorage.removeItem("user");
};

const getProfile = async () => {
  const token = localStorage.getItem("token");
  const response = await axios.get(`${API_URL}/profile`, {
    headers: {
      Authorization: `Bearer ${token}`,
    },
  });
  return response.data;
};

export default {
  login,
  logout,
  getProfile,
};
