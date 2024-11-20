<template>
  <div class="products">
    <h2>Unsere Produkte</h2>
    <div class="row">
      <div v-for="(product, index) in products" :key="index" class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card">
          <td>
          <img :src="'/backend/uploads/' + product.image" alt="Produktbild" @error="handleImageError">
          </td>
          <div class="card-body">
            <p class="card-text">{{ product.brand }}</p>
            <h5 class="card-title">{{ product.name }}</h5>
            <p class="card-price">{{ product.price }} €</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Products',
  data() {
    return {
      products: [], 
    };
  },
  created() {
    this.fetchProducts(); 
  },
  methods: {
    async fetchProducts() {
      try {
        const response = await fetch('http://localhost/code_online_shop/backend/products.php');
        const data = await response.json(); 
        this.products = data; 
      } catch (error) {
        console.error('Fehler beim Abrufen der Produkte:', error); 
      }
    },
    handleImageError(event) {
    event.target.src = '/backend/uploads/platzhalter.png'; // Standardbild setzen
  },
}
};
</script>

<style scoped>
.products {
  padding-top: 5rem; 
  padding-bottom: 5rem; 
}

.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  max-width: 100%; 
  height: auto; 
}

.card img {
  width: 100%;
  height:auto; 
  object-fit: cover;
}

.card-body {
  padding: 0.8rem; 
}

.card-title {
  font-size: 1rem; 
}

.card-text {
  font-size: 0.8rem; 
}
.products h2 {
  text-align: center; 
}

.card-price {
  font-weight: bold; 
  font-size: 1.2rem;
}
</style>
