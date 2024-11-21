<template>
  <div class="overview">
    <h5>Übersicht</h5>

    <div v-if="errorMessage" class="error-message">
      <p>{{ errorMessage }}</p>
    </div>

    <div class="card-container">
      <div class="card">
        <div class="card-value">{{ totalProducts }}</div>
        <div class="card-label">Produkte</div>
      </div>
      <div class="card">
        <div class="card-value">{{ totalCustomers }}</div>
        <div class="card-label">Kunden</div>
      </div>
      <div class="card">
        <div class="card-value">{{ totalOrders }}</div>
        <div class="card-label">Bestellungen</div>
      </div>
    </div>
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
.overview {
  text-align: left;
}

.error-message {
  background-color: #f8d7da;
  color: #721c24;
  padding: 10px;
  margin-top: 10px;
  text-align: left;
  border-radius: 5px;
  width: 50%;
}

.card-container {
  display: flex;
  justify-content: space-between;
  align-items: stretch;
  gap: 20px;
  margin-top: 20px;
  flex-wrap: wrap;
}

.card {
  border: 1px solid #f092188d;
  border-radius: 10px;
  padding: 20px;
  flex: 1;
  text-align: center;
  box-shadow: 0 6px 7px rgba(0, 0, 0, 0.086);
  min-width: 150px;
  margin: 0 10px;
  background-color: #fcf1e2
}

.card-value {
  font-size: 2.5rem;
  font-weight: bold;
  color: #f09118;
}

.card-label {
  margin-top: 10px;
  font-size: 1.2rem;
  color: #f09118;
}

</style>
