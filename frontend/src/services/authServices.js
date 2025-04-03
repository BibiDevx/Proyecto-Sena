const authService = {
    login: async (credentials) => {
      console.log("Intentando iniciar sesión con", credentials);
      return { success: true, token: "fake-jwt-token" };
    },
  };
  
  export default authService;