<template>
  <div v-if="isVisible" class="modal-overlay" @click.self="close">
    <div class="modal-content">
      <h2>Login</h2>
      <form @submit.prevent="submitLogin">
        <div class="form-group">
          <label for="username">E-Mail</label>
          <input type="text" id="username" v-model="username" required />
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
      username: "",
      password: "",
      loginError: "", // Fehlermeldung für den Login
      isVisible: true, // Modal sichtbar machen
    };
  },
  methods: {
    close() {
      this.$emit("close");
    },
    async submitLogin() {
      // Übertragen der Daten an login.php
      try {
        const formData = new FormData();
        formData.append("username", this.username);
        formData.append("password", this.password);

        const response = await fetch("http://localhost/projektordner/login.php", {
          method: "POST",
          body: formData,
        });

        const data = await response.text();

        if (data.includes("Login fehlgeschlagen")) {
          this.loginError = "Login fehlgeschlagen. Bitte überprüfen Sie Ihre Daten.";
        } else {
          // Erfolgreicher Login, Modal schließen
          this.close();
          window.location.href = "/dashboard";
        }
      } catch (error) {
        console.error("Fehler beim Login:", error);
        this.loginError = "Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.";
      }
    },
  },
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
