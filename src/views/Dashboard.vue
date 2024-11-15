<template>
    <div class="container-lg">
      <Breadcrumbs />
      <h1>Willkommen auf deinem Dashboard</h1>
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Mein Account</h5>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <h5>Übersicht</h5>
          </div>
        </div>
        <button type="button" class="logout-btn" @click="logout">Logout</button>
    </div>
  </template>
  
  <script>
  import Breadcrumbs from '@/components/breadcrumbs.vue';
  import { useRouter } from 'vue-router'; // Importiere den Router
  
  export default {
    name: 'Dashboard',
    components: {
      Breadcrumbs,
    },
    methods: {
      async logout() {
        try {
          // Sende die Anfrage an logout.php
          const response = await fetch('http://localhost/code_online_shop/backend/logout.php', {
            method: 'GET',
            credentials: 'include',
          });
  
          const result = await response.json();
          
          if (result.message === "Logout erfolgreich!") {
            // Nach erfolgreichem Logout, leite den Benutzer zur Startseite
            this.$router.push({ name: 'Home' }); // 'Home' ist der Name der Startseite im Vue-Router
          } else {
            console.error("Logout fehlgeschlagen:", result.message);
          }
        } catch (error) {
          console.error("Fehler beim Logout:", error);
        }
      },
    },
  };
  </script>
  
  
  <style scoped>
  .row {
    margin-top: 3vh;
    margin-bottom: 5vh;
  }
  
  </style>