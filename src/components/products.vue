<template>
  <div>
    <h2>Unsere Produkte</h2>
    <div class="row">
      <div v-for="(product, index) in products" :key="index" class="col-6 col-sm-6 col-md-3 mb-4">
        <div class="card">
          <img :src="product.image" class="card-img-top" :alt="product.name" />
          <div class="card-body">
            <p class="card-text"><strong>Marke:</strong> {{ product.brand }}</p>
            <h5 class="card-title">{{ product.name }}</h5>
            <p class="card-text"><strong>Preis:</strong> {{ product.price }} €</p>
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
        { name: 'Produkt 1', brand: 'Marke A', description: 'Beschreibung für Produkt 1', price: '29.99', image: 'https://via.placeholder.com/150' },
        { name: 'Produkt 2', brand: 'Marke B', description: 'Beschreibung für Produkt 2', price: '49.99', image: 'https://via.placeholder.com/150' },
        { name: 'Produkt 3', brand: 'Marke C', description: 'Beschreibung für Produkt 3', price: '19.99', image: 'https://via.placeholder.com/150' },
        { name: 'Produkt 4', brand: 'Marke D', description: 'Beschreibung für Produkt 4', price: '39.99', image: 'https://via.placeholder.com/150' },
        { name: 'Produkt 5', brand: 'Marke E', description: 'Beschreibung für Produkt 5', price: '59.99', image: 'https://via.placeholder.com/150' },
        { name: 'Produkt 6', brand: 'Marke F', description: 'Beschreibung für Produkt 6', price: '25.99', image: 'https://via.placeholder.com/150' },
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
