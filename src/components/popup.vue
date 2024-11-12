<template>
  <div v-if="isVisible" class="modal-overlay" @click.self="close">
    <div class="modal-content">
      <h2>Login</h2>
      <form @submit.prevent="submitLogin">
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input type="text" id="email" v-model="email" required />
        </div>
        <div class="form-group">
          <label for="password">Passwort</label>
          <input type="password" id="password" v-model="password" required />
        </div>
        <button type="submit" class="submit-btn">Anmelden</button>
        <button type="button" class="close-btn" @click="close">Schließen</button>
      </form>
      <p v-if="loginError" class="error-message">{{ loginError }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Popup",
  data() {
    return {
      email: "",
      password: "",
      loginError: "", 
      isVisible: true,
    };
  },
  methods: {
  async submitLogin() {
    const formData = new FormData();
    formData.append("email", this.email);
    formData.append("password", this.password);
    
    try {
      const response = await fetch('http://localhost/code_online_shop/backend/login.php', {
        method: 'POST',
        body: formData
      });
      const result = await response.json();
      
      if (result.success) {
        // Login erfolgreich
        console.log("Login erfolgreich");
        this.$emit('close');
      } else {
        // Login fehlgeschlagen
        this.loginError = result.message || "Login fehlgeschlagen";
      }
    } catch (error) {
      console.error("Fehler beim Login:", error);
      this.loginError = "Ein Fehler ist aufgetreten.";
    }
  },
  close() {
    this.$emit('close');
  }
}
};
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1050;
}

.modal-content {
  background-color: #ffffff;
  padding: 2rem;
  border-radius: 8px;
  width: 90%;
  max-width: 400px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  text-align: center;
}

.form-group {
  margin-bottom: 1rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: bold;
}

.form-group input {
  width: 100%;
  padding: 0.5rem;
  border-radius: 4px;
  border: 1px solid #ddd;
}

.submit-btn {
  background-color: #f09118;
  color: white;
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 1rem;
}

.submit-btn:hover {
  background-color: #d57d0b;
}

.close-btn {
  background-color: transparent;
  border: none;
  color: #777;
  font-size: 0.9rem;
  cursor: pointer;
  margin-top: 1rem;
  display: block;
  width: 100%;
}

.error-message {
  color: red;
  margin-top: 1rem;
  font-size: 0.9rem;
}
</style>
