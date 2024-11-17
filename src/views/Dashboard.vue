<template>
  <div class="container-lg">
    <Breadcrumbs />
    <h1>Hallo {{ userName }}!</h1>
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Mein Account</h5>
            <button type="button" class="logout-btn" @click="logout">Logout</button>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Übersicht</h5>
            <!-- Admin-spezifische Inhalte -->
            <div v-if="userisAdmin">
              <div class="row">
                <!-- Erste Karte -->
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h6>Bestellungen</h6>
                      <p>Du hast (Anzahl) Bestellungen. Gut gemacht, alles verschickt! / Verschicke die offenen Bestellungen.</p>
                    </div>
                  </div>
                </div>
                <!-- Zweite Karte -->
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h6>Newsletter</h6>
                      <p>Du hast (Anzahl) Newsletter Anmeldungen.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- User-spezifische Inhalte -->
            <div v-else>
              <h6>User-Bereich</h6>
              <p>Willkommen im Dashboard! Hier kannst du deine Daten einsehen.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import Breadcrumbs from '@/components/breadcrumbs.vue';
export default {
  name: 'Dashboard',
  components: {
    Breadcrumbs,
  },
  data() {
    return {
      userName: '', // Name des Users
      userisAdmin: '', // Rolle des Users
    };
  },
  async mounted() {
    try {
      const response = await fetch('http://localhost/code_online_shop/backend/user_info.php', {
        method: 'GET',
        credentials: 'include',
      });
      const result = await response.json();

      if (result.success) {
        // Setzt die Rolle in der Komponente
        this.userisAdmin = result.isAdmin;
        // Setzt den Namen in der Komponente
        this.userName = result.firstname;
      } else {
        console.error("Fehler beim Abrufen der Daten:", result.message);
      }
    } catch (error) {
      console.error("Fehler beim Abrufen der Daten:", error);
    }
  },
  methods: {
    async logout() {
      try {
        const response = await fetch('http://localhost/code_online_shop/backend/logout.php', {
          method: 'GET',
          credentials: 'include',
        });

        const result = await response.json();

        if (result.message === "Logout erfolgreich!") {
          this.$router.push({ name: 'Home' });
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
.breadcrumbs {
  margin-top: 3vh;
}
.logout-btn {
  background-color: #f09118;
  color: white;
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 1rem;
}

.logout-btn:hover {
  background-color: #d57d0b;
}
</style>
