<template>
  <div class="address">
    <h5>Adresse verwalten</h5>

    <div v-if="errorMessage" class="error-message">
      <p>{{ errorMessage }}</p>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>Straße</th>
          <th>Hausnummer</th>
          <th>Stadt</th>
          <th>Postleitzahl</th>
          <th>Land</th>
          <th>Aktion</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <input type="text" v-model="address.street" />
          </td>
          <td>
            <input type="text" v-model="address.house_number" />
          </td>
          <td>
            <input type="text" v-model="address.city" />
          </td>
          <td>
            <input type="text" v-model="address.postal_code" />
          </td>
          <td>
            <input type="text" v-model="address.country" />
          </td>
          <td>
            <button @click="saveAddress">Speichern</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "Address",
  data() {
    return {
      address: {
        street: "",
        house_number: "",
        city: "",
        postal_code: "",
        country: "",
      },
      errorMessage: "",
    };
  },
  created() {
    this.fetchAddress();
  },
  methods: {
    async fetchAddress() {
      try {
        const response = await fetch(
          "http://localhost/code_online_shop/backend/get_address.php",
          {
            method: "GET",
            credentials: "include",
          }
        );
        const data = await response.json();

        if (data.success) {
          this.address = data.address || this.address;
        } else {
          this.errorMessage = data.message || "Fehler beim Abrufen der Adresse.";
        }
      } catch (error) {
        this.errorMessage = "Ein Fehler ist aufgetreten: " + error.message;
        console.error("Fehler beim Abrufen der Adresse:", error);
      }
    },
    async saveAddress() {
      try {
        const response = await fetch(
          "http://localhost/code_online_shop/backend/save_address.php",
          {
            method: "POST",
            credentials: "include",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(this.address),
          }
        );
        const data = await response.json();

        if (data.success) {
          alert("Adresse erfolgreich gespeichert!");
        } else {
          this.errorMessage = data.message || "Fehler beim Speichern der Adresse.";
        }
      } catch (error) {
        this.errorMessage = "Ein Fehler ist aufgetreten: " + error.message;
        console.error("Fehler beim Speichern der Adresse:", error);
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

.table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.table th,
.table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

input {
  width: 100%;
  padding: 5px;
  box-sizing: border-box;
}

button {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 5px 10px;
  border-radius: 3px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}
</style>
