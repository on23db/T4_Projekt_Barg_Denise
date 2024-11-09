<template>
  <div class="information text-center">Spiel Essen 2024 – Wir sind dabei an Stand DB137! Jetzt Termine mit uns buchen!</div>
  <nav class="navbar navbar-expand-lg">
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
            <router-link class="nav-link" to="/unternehmen">Unternehmen</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/kataloge">Kataloge</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/news">News</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/events">Events</router-link>
          </li>
        </ul>
        <!-- Rechter Bereich: Icons -->
        <div class="d-flex">
          <router-link class="me-3" to="/"><i class="bi bi-search"></i></router-link>
          <router-link class="me-3" to="/konto"><i class="bi bi-person-circle"></i></router-link>
          <router-link class="me-3" to="/warenkorb"><i class="bi bi-bag"></i></router-link>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
};
</script>

<style scoped>
.information {
background-color: #F09118; 
color: white;
display: flex;
justify-content: center;
align-items: center;
height: 6vh; 
margin-bottom: 0px;
font-size: 0.9rem;
}

@media (max-width: 576px) {
.information {
  font-size: 0.75rem; 
  height: auto;       
  padding: 10px;      
}
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
