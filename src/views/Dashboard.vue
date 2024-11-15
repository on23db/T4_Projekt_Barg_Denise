<template>
  <div class="container-lg">
      <Breadcrumbs />
    <h1>Hallo {{ userName }}!</h1>
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
</style>
