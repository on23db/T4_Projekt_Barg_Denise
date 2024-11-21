<template>
  <div class="product_editor">
    <h5>Produktverwaltung</h5>

    <!-- Fehlernachricht -->
    <div v-if="errorMessage" class="error-message">
      <p>{{ errorMessage }}</p>
    </div>

    <!-- Produktliste -->
    <table class="table">
      <thead>
        <tr>
          <th>SKU</th>
          <th>Produktname</th>
          <th>Marke</th>
          <th>Preis</th>
          <th>Bild</th>
          <th>Aktionen</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.sku">
          <td>{{ product.sku }}</td>
          <td>{{ product.name }}</td>
          <td>{{ product.brand }}</td>
          <td>{{ product.price }} €</td>
          <td>{{ product.image }}</td>
          <td>
            <button @click="editProduct(product.sku)" class="btn btn-primary">Edit</button>
            <button @click="deleteProduct(product.sku)" class="btn btn-danger">Delete</button>
          </td>
        </tr>
        <!-- Zeile zum neuen Produkt anlegen -->
        <tr @click="createNewProduct" class="new-product-row">
          <td colspan="6" class="text-center">+ Neues Produkt anlegen</td>
        </tr>
      </tbody>
    </table>

    <!-- Modal zum Bearbeiten eines Produkts -->
    <div v-if="isEditing || isCreating" class="modal">
      <div class="modal-content">
        <h3>{{ isEditing ? 'Produkt bearbeiten' : 'Neues Produkt anlegen' }}</h3>
        <form @submit.prevent="isEditing ? updateProduct() : createProduct()" enctype="multipart/form-data">
          <div>
            <label for="name">SKU</label>
            <input type="text" v-model="editedProduct.sku" required />
          </div>
          <div>
            <label for="name">Produktname</label>
            <input type="text" v-model="editedProduct.name" required />
          </div>
          <div>
            <label for="brand">Marke</label>
            <input type="text" v-model="editedProduct.brand" required />
          </div>
          <div>
            <label for="price">Preis</label>
            <input type="number" v-model="editedProduct.price" required step="0.01" />
          </div>
          <div>
            <label for="image">Bild</label>
            <input type="file" name="image" @change="handleFileUpload" />
          </div>
          <button type="submit">Speichern</button>
          <button type="button" @click="cancelEdit">Abbrechen</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "product_editor",
  data() {
    return {
      products: [], // Liste der Produkte
      editedProduct: {
        sku: "",
        name: "",
        brand: "",
        price: "",
        image: "", // Bild-Dateiname
      },
      isEditing: false, 
      isCreating: false, // Neue Variable für das Erstellen eines Produkts
      errorMessage: "",
    };
  },
  created() {
    this.fetchProducts();
  },
  methods: {
  async fetchProducts() {
    try {
      const response = await fetch("http://localhost/code_online_shop/backend/products.php");
      const data = await response.json();
      if (Array.isArray(data)) {
        this.products = data;
      } else {
        this.errorMessage = "Unerwartetes Format der Produktdaten.";
      }
      this.errorMessage = "";
    } catch (error) {
      this.errorMessage = "Fehler beim Abrufen der Produkte.";
      console.error("Fehler beim Abrufen der Produkte:", error);
    }
  },

  editProduct(sku) {
    if (!sku) {
      this.errorMessage = "Ungültige SKU für Bearbeitung.";
      return;
    }
    const product = this.products.find((p) => p.sku === sku);
    if (product) {
      this.editedProduct = { ...product };
      this.isEditing = true;
    } else {
      this.errorMessage = "Produkt nicht gefunden.";
    }
  },

  async updateProduct() {
  try {
    // Setze die SKU direkt aus der Eingabe
    const response = await fetch("http://localhost/code_online_shop/backend/update_product.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(this.editedProduct),
    });
    const data = await response.json();
    if (data.success) {
      // Produkt in der Liste direkt überschreiben
      const index = this.products.findIndex((p) => p.sku === this.editedProduct.sku);
      if (index !== -1) {
        // SKU direkt überschreiben
        this.products[index] = { ...this.editedProduct };
        this.isEditing = false;
      } else {
        this.errorMessage = "Produkt konnte nicht aktualisiert werden.";
      }
    } else {
      this.errorMessage = "Fehler beim Aktualisieren des Produkts.";
    }
  } catch (error) {
    this.errorMessage = "Fehler beim Senden der Aktualisierungsanfrage.";
    console.error("Fehler beim Senden der Anfrage:", error);
  }
},

  async deleteProduct(sku) {
    if (!sku) {
      this.errorMessage = "Ungültige SKU für Löschung.";
      return;
    }
    try {
      const response = await fetch(`http://localhost/code_online_shop/backend/delete_product.php?sku=${sku}`, {
        method: "DELETE",
      });
      const data = await response.json();
      if (data.success) {
        this.products = this.products.filter((product) => product.sku !== sku);
      } else {
        this.errorMessage = "Fehler beim Löschen des Produkts.";
      }
    } catch (error) {
      this.errorMessage = "Fehler beim Senden der Löschanfrage.";
      console.error("Fehler beim Senden der Anfrage:", error);
    }
  },

  createNewProduct() {
    this.editedProduct = {
      sku: "",
      name: "",
      brand: "",
      price: "",
    };
    this.isCreating = true;
  },

  async createProduct() {
  try {
    // Direkt sicherstellen, dass die SKU der neuen Produkte korrekt gesetzt ist
    const response = await fetch("http://localhost/code_online_shop/backend/create_product.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(this.editedProduct),
    });
    const data = await response.json();
    if (data.success) {
      // Das neue Produkt mit der neuen SKU hinzufügen
      this.products.push({ ...this.editedProduct });
      this.isCreating = false;
    } else {
      this.errorMessage = "Fehler beim Erstellen des Produkts.";
    }
  } catch (error) {
    this.errorMessage = "Fehler beim Senden der Anfrage.";
    console.error("Fehler beim Senden der Anfrage:", error);
  }
},

  handleFileUpload(event) {
  const file = event.target.files[0];
  if (file) {
    const formData = new FormData();
    const newFileName = `${file.name}`;
    formData.append("image", file, newFileName);  // Datei mit neuem Namen anhängen
    this.editedProduct.image = newFileName;  // Den neuen Dateinamen speichern
    const reader = new FileReader();
    reader.onload = (e) => {
      this.imagePreview = e.target.result;
    };
    reader.readAsDataURL(file);
    this.uploadImage(formData);
  }
},

async uploadImage(formData) {
  try {
    const response = await fetch("http://localhost/code_online_shop/backend/upload_image.php", {
      method: "POST",
      body: formData,
    });
    const data = await response.json();
    console.log(data);  // Debugging-Zeile, um die Antwort zu prüfen
    if (!data.success) {
      this.errorMessage = "Fehler beim Hochladen des Bildes.";
    } else {
      this.errorMessage = ""; // Erfolgreich hochgeladen, Fehlernachricht zurücksetzen
    }
  } catch (error) {
    this.errorMessage = "Fehler beim Hochladen des Bildes.";
    console.error("Fehler beim Senden der Anfrage:", error);
  }
},

  cancelEdit() {
    this.isEditing = false;
    this.isCreating = false;
  },
},
};
</script>

  
  <style scoped>
  .table {
    width: 100%;

  }
  
  .table th,
  .table td {
    text-align: left;
  }
  
  .error-message {
    color: red;
    margin-bottom: 1rem;
  }
  
  .modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.3s ease;
  }
  
  .modal-content {
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 400px;
  }
  
  button {
    margin: 0.5rem;
    padding: 0.7rem;
    cursor: pointer;
    border: none;
  }
  
  .btn-primary {
    background-color: #007bff;
    color: white;
  }
  
  .btn-danger {
    background-color: #dc3545;
    color: white;
  }
  
  form input {
    margin-bottom: 1rem;
    padding: 0.5rem;
    width: 100%;
  }
  
  form button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 0.7rem;
    cursor: pointer;
  }
  
  form button:hover {
    background-color: #0056b3;
  }
  
  form {
    margin-top: 1rem;
  }

  .text-center {
    background-color: #ebebeb;
  }
  
  .text-center:hover {
    background-color: #d1d1d1;
  }

  .new-product-row {
    cursor: pointer;
    font-style: italic;
  }
  </style>
  