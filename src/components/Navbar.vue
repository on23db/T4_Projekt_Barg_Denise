<template>
  <div class="information container-fluid text-center">
    Spiel Essen 2024 – Wir sind dabei an Stand DB137! Jetzt Termine mit uns buchen!
  </div>
  
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-lg">
      <!-- Linker Bereich: Logo -->
      <router-link class="navbar-brand" to="/">
        <img src="/src/assets/Logo_RGB.png" alt="Logo">
      </router-link>

      <!-- Toggler für mobile Ansicht -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Mittlerer Bereich: Menü-Links -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link class="nav-link" to="/product">Produkte</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/placeholder">Unternehmen</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/placeholder">Kataloge</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/placeholder">News</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/placeholder">Events</router-link>
          </li>
        </ul>
        
        <!-- Rechter Bereich: Icons -->
        <div class="d-flex">
          <router-link class="me-3" to="/"><i class="bi bi-search"></i></router-link>
          <a class="me-3" @click.p="openLoginPopup"><i class="bi bi-person-circle"></i></a>
          <router-link class="me-3" to="/warenkorb"><i class="bi bi-bag"></i></router-link>
        </div>
      </div>
    </div>
  </nav>

  <!-- Popup-Komponente für Login -->
  <Popup v-if="isLoginPopupVisible" @close="closeLoginPopup" />
</template>

<script>
import Popup from './popup.vue';

export default {
  name: 'Navbar',
  components: {
    Popup,
  },
  data() {
    return {
      isLoginPopupVisible: false,
    };
  },
  methods: {
  openLoginPopup() {
    this.isLoginPopupVisible = false;
    this.$nextTick(() => {
      this.isLoginPopupVisible = true;
    });
  },
  closeLoginPopup() {
    this.isLoginPopupVisible = false;
  },
}
}
</script>

<style scoped>
.information {
  background-color: #F09118; 
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 5vh; 
  margin-bottom: 0px;
  font-size: 0.9rem;
}

nav {
  background-color: #ffffff; 
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.navbar-brand img {
  height: 50px;
}

.navbar-nav .nav-link {
  padding: 0 10px;
}

li.nav-item {
  margin-left: 2rem;
}

.d-flex a {
  color: #343434;
  font-size: 1.5rem;
}

.d-flex {
  margin-left: auto;
}

.me-3 {
  margin-right: 3rem;
}
</style>
