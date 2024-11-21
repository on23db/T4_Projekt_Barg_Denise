<template>
  <div v-if="isVisible" class="modal-overlay" @click.self="close">
    <div class="modal-content">
      <h2>{{ isRegistering ? 'Registrieren' : 'Login' }}</h2>
      
      <!-- Login Formular -->
      <form v-if="!isRegistering" @submit.prevent="submitLogin">
        <div class="form-group">
          <input type="email" id="email" placeholder="E-Mail" v-model="email" required />
        </div>
        <div class="form-group">
          <input type="password" id="password" placeholder="Passwort" v-model="password" required />
        </div>
        <button type="submit" class="submit-btn">Anmelden</button>
        <p>Noch kein Konto? <a href="#" @click.prevent="toggleForm">Registrieren</a></p>
      </form>

      <!-- Registrierungsformular -->
      <form v-if="isRegistering" @submit.prevent="submitRegister">
        <div class="form-group">
          <input type="text" id="firstname" placeholder="Vorname" v-model="firstname" required />
        </div>
        <div class="form-group">
          <input type="text" id="lastname" placeholder="Nachname" v-model="lastname" required />
        </div>
        <div class="form-group">
          <input type="email" id="email" placeholder="E-Mail" v-model="email" required />
        </div>
        <div class="form-group">
          <input type="password" id="password" placeholder="Passwort" v-model="password" required />
        </div>
        <div class="form-group">
          <input type="password" id="confirmPassword" placeholder="Passwort wiederholen" v-model="confirmPassword" required />
        </div>
        <button type="submit" class="submit-btn">Registrieren</button>
        <p>Bereits ein Konto? <a href="#" @click.prevent="toggleForm">Anmelden</a></p>
      </form>

      <button type="button" class="close-btn" @click="close">Schließen</button>
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
      confirmPassword: "",
      firstname: "",
      lastname: "",
      loginError: "",
      isVisible: true,
      isRegistering: false, // Zustand für Login/Registrierung wechseln
    };
  },
  methods: {
    // Wechselt zwischen Login und Registrierung
    toggleForm() {
      this.isRegistering = !this.isRegistering;
    },
    async submitLogin() {
      const formData = new FormData();
      formData.append("email", this.email);
      formData.append("password", this.password);

      try {
        const response = await fetch('http://localhost/code_online_shop/backend/login.php', {
          method: 'POST',
          body: formData,
          credentials: 'include',
        });
        
        const result = await response.json();
        
        if (result.message === "Login erfolgreich!") {
          console.log("Login erfolgreich");
          this.$router.push({ name: 'Dashboard' });
          this.$emit('close');
        } else {
          this.loginError = result.message || "Login fehlgeschlagen";
        }
      } catch (error) {
        console.error("Fehler beim Login:", error);
        this.loginError = "Ein Fehler ist aufgetreten.";
      }
    },

    async submitRegister() {
      if (this.password !== this.confirmPassword) {
        this.loginError = "Passwörter stimmen nicht überein.";
        return;
      }

      const formData = new FormData();
      formData.append("firstname", this.firstname);
      formData.append("lastname", this.lastname);
      formData.append("email", this.email);
      formData.append("password", this.password);

      try {
        const response = await fetch('http://localhost/code_online_shop/backend/register.php', {
          method: 'POST',
          body: formData,
          credentials: 'include',
        });
        
        const result = await response.json();
        
        if (result.message === "Registrierung erfolgreich!") {
          console.log("Registrierung erfolgreich");
          this.toggleForm(); // Wechsel zu Login nach erfolgreicher Registrierung
        } else {
          this.loginError = result.message || "Registrierung fehlgeschlagen";
        }
      } catch (error) {
        console.error("Fehler bei der Registrierung:", error);
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
  margin-bottom: 0.8rem;
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

h2 {
  margin-bottom: 1.5rem;
  font-weight: bold;
}
</style>
