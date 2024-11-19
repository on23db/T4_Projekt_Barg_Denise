<template>
    <div class="overview">
      <h5>Übersicht</h5>
  
      <!-- Fehlernachricht -->
      <div v-if="errorMessage" class="error-message">
        <p>{{ errorMessage }}</p>
      </div>
  
      <!-- Übersichtstabelle (Zusammenfassung) -->
      <table class="table">
        <thead>
          <tr>
            <th>Statistik</th>
            <th>Wert</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Gesamtzahl der Produkte</td>
            <td>{{ totalProducts }}</td>
          </tr>
          <tr>
            <td>Gesamtzahl der Bestellungen</td>
            <td>{{ totalOrders }}</td>
          </tr>
          <tr>
            <td>Gesamtzahl der Kunden</td>
            <td>{{ totalCustomers }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    name: "overview",
    data() {
      return {
        totalProducts: 0,
        totalOrders: 0,
        totalCustomers: 0,
        errorMessage: "",
      };
    },
    created() {
      this.fetchOverviewData();
    },
    methods: {
      async fetchOverviewData() {
        try {
          const response = await fetch("http://localhost/code_online_shop/backend/overview.php");
          const data = await response.json();
  
          if (data.success) {
            this.totalProducts = data.totalProducts;
            this.totalOrders = data.totalOrders;
            this.totalCustomers = data.totalCustomers;
          } else {
            this.errorMessage = "Fehler beim Abrufen der Übersichtsdaten.";
          }
        } catch (error) {
          this.errorMessage = "Fehler beim Abrufen der Übersichtsdaten.";
          console.error("Fehler:", error);
        }
      },
    },
  };
  </script>
  
<style scoped>
    .error-message {
      background-color: #f8d7da;
      color: #721c24;
      padding: 10px;
      margin-top: 10px;
      text-align: center;
      border-radius: 5px;
    }
</style>