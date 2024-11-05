<template>
    <div>
      <h2>Unsere Produkte</h2>
      <div class="row">
        <div v-for="(product, index) in products" :key="index" class="col-md-4 mb-4">
          <div class="card">
            <img :src="product.image" class="card-img-top" :alt="product.name" />
            <div class="card-body">
              <h5 class="card-title">{{ product.name }}</h5>
              <p class="card-text">{{ product.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'products',
    data() {
      return {
        products: [
          { name: 'Produkt 1', description: 'Beschreibung für Produkt 1', image: 'https://via.placeholder.com/150' },
          { name: 'Produkt 2', description: 'Beschreibung für Produkt 2', image: 'https://via.placeholder.com/150' },
          { name: 'Produkt 3', description: 'Beschreibung für Produkt 3', image: 'https://via.placeholder.com/150' },
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
  }
  p {
    font-size: 0.9rem;
    font-family: 'Roboto', sans-serif;
  }
  </style>
  