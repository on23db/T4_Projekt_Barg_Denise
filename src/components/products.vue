<template>
  <div>
    <h2>Unsere Produkte</h2>
    <div class="row">
      <div v-for="(product, index) in products" :key="index" class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card">
          <img :src="product.image ? product.image : 'https://via.placeholder.com/100'" class="card-img-top" :alt="product.name" />
          <div class="card-body">
            <p class="card-text">{{ product.brand }}</p>
            <h5 class="card-title">{{ product.name }}</h5>
            <p class="card-text">{{ product.price }} €</p>
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
        console.log(data); 
        this.products = data; 
      } catch (error) {
        console.error('Fehler beim Abrufen der Produkte:', error); 
      }
    },
  },
};
</script>

<style scoped>
.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  max-width: 100%; /* Beschränkt die Kartenbreite */
  height: auto; /* Anpassung an den Inhalt */
}

.card img {
  width: 100%;
  height:auto; /* Verkleinert die Höhe des Bildes */
  object-fit: cover;
}

.card-body {
  padding: 0.8rem; /* Weniger Padding für kompakteres Layout */
}

.card-title {
  font-size: 0.9rem; /* Kleinere Schriftgröße */
}

.card-text {
  font-size: 0.8rem; /* Kleinere Schriftgröße */
}
</style>
