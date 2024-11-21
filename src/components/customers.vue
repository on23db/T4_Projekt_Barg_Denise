<template>
  <div class="customers">
    <h5>Kundenverwaltung</h5>

    <div v-if="errorMessage" class="error-message">
      <p>{{ errorMessage }}</p>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>Kunden-ID</th>
          <th>Vorname</th>
          <th>Nachname</th>
          <th>E-Mail</th>
          <th>Straße</th>
          <th>Hausnummer</th>
          <th>Stadt</th>
          <th>Postleitzahl</th>
          <th>Land</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="customer in customers" :key="customer.id">
          <td>{{ customer.id }}</td>
          <td>{{ customer.firstname }}</td>
          <td>{{ customer.lastname }}</td>
          <td>{{ customer.email }}</td>
          <td>{{ customer.street }}</td>
          <td>{{ customer.house_number }}</td>
          <td>{{ customer.city }}</td>
          <td>{{ customer.postal_code }}</td>
          <td>{{ customer.country }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "customers",
  data() {
    return {
      customers: [], // Liste der Kunden
      errorMessage: "",
    };
  },
  created() {
    this.fetchCustomers();
  },
  methods: {
    async fetchCustomers() {
      try {
        const response = await fetch("http://localhost/code_online_shop/backend/customers.php");
        const data = await response.json();

        if (Array.isArray(data)) {
          this.customers = data;
        } else {
          this.errorMessage = "Fehler beim Abrufen der Kundendaten.";
        }
      } catch (error) {
        this.errorMessage = "Fehler beim Abrufen der Kundendaten.";
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
