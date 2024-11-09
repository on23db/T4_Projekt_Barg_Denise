<!-- src/components/Navbar.vue -->
<template>
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
          <a href="#" class="me-3"><i class="bi bi-search"></i></a>
          <a href="#" class="me-3"><i class="bi bi-person-circle"></i></a>
          <a href="#"><i class="bi bi-bag"></i></a>
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
nav {
  background-color: #ffffff; 
  position: sticky;
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
