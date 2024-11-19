<template>
    <div class="customers">
      <h5>Kundenverwaltung</h5>
  
      <!-- Fehlernachricht -->
      <div v-if="errorMessage" class="error-message">
        <p>{{ errorMessage }}</p>
      </div>
  
      <!-- Kundenliste -->
      <table class="table">
        <thead>
          <tr>
            <th>Kunden-ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Aktionen</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="customer in customers" :key="customer.id">
            <td>{{ customer.id }}</td>
            <td>{{ customer.name }}</td>
            <td>{{ customer.email }}</td>
            <td>{{ customer.phone }}</td>
            <td>
              <button @click="editCustomer(customer.id)" class="btn btn-primary">Bearbeiten</button>
              <button @click="deleteCustomer(customer.id)" class="btn btn-danger">Löschen</button>
            </td>
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
      async deleteCustomer(customerId) {
        try {
          const response = await fetch(`http://localhost/code_online_shop/backend/delete_customer.php?id=${customerId}`, {
            method: "DELETE",
          });
          const data = await response.json();
          if (data.success) {
            this.customers = this.customers.filter((customer) => customer.id !== customerId);
          } else {
            this.errorMessage = "Fehler beim Löschen des Kunden.";
          }
        } catch (error) {
          this.errorMessage = "Fehler beim Löschen des Kunden.";
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