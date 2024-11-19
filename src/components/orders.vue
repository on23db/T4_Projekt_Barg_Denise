<template>
    <div class="orders">
      <h5>Bestellverwaltung</h5>
  
      <!-- Fehlernachricht -->
      <div v-if="errorMessage" class="error-message">
        <p>{{ errorMessage }}</p>
      </div>
  
      <!-- Bestellliste -->
      <table class="table">
        <thead>
          <tr>
            <th>Bestell-ID</th>
            <th>Kunde</th>
            <th>Datum</th>
            <th>Status</th>
            <th>Aktionen</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="order in orders" :key="order.id">
            <td>{{ order.id }}</td>
            <td>{{ order.customerName }}</td>
            <td>{{ order.date }}</td>
            <td>{{ order.status }}</td>
            <td>
              <button @click="viewOrderDetails(order.id)" class="btn btn-info">Details</button>
              <button @click="deleteOrder(order.id)" class="btn btn-danger">Löschen</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    name: "orders",
    data() {
      return {
        orders: [], // Liste der Bestellungen
        errorMessage: "",
      };
    },
    created() {
      this.fetchOrders();
    },
    methods: {
      async fetchOrders() {
        try {
          const response = await fetch("http://localhost/code_online_shop/backend/orders.php");
          const data = await response.json();
  
          if (Array.isArray(data)) {
            this.orders = data;
          } else {
            this.errorMessage = "Fehler beim Abrufen der Bestelldaten.";
          }
        } catch (error) {
          this.errorMessage = "Fehler beim Abrufen der Bestelldaten.";
          console.error("Fehler:", error);
        }
      },
      async deleteOrder(orderId) {
        try {
          const response = await fetch(`http://localhost/code_online_shop/backend/delete_order.php?id=${orderId}`, {
            method: "DELETE",
          });
          const data = await response.json();
          if (data.success) {
            this.orders = this.orders.filter((order) => order.id !== orderId);
          } else {
            this.errorMessage = "Fehler beim Löschen der Bestellung.";
          }
        } catch (error) {
          this.errorMessage = "Fehler beim Löschen der Bestellung.";
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