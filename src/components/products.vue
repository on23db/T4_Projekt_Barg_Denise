<template>
  <div class="products">
    <div class="row">
    <h2>Unsere Spielwelt im Überblick✨</h2>
    <p>Stöbere durch unsere <mark>abwechslungsreiche Auswahl</mark> an Produkten! Wir bieten dir nicht nur spannende Brett- und Kartenspiele, sondern auch kreative Holzpuzzles und bezaubernde Puppen. Finde das perfekte Spielzeug für jede Altersgruppe und Gelegenheit.</p>
    </div>
    <div class="row">
      <div v-for="(product, index) in products" :key="index" class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card">
          
          <img :src="'/backend/uploads/' + product.image" alt="Produktbild" @error="handleImageError">
          
          <div class="card-body">
            <span class="badge">{{ product.brand }}</span>
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
    event.target.src = '/backend/uploads/platzhalter.png'; // Standardbild setzen, wenn kein hinterlegtes Bild vorhanden ist
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
  transition: all 0.2s;
  cursor: pointer;
  height: 90%;
}

.card:hover {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
  transform: translateY(-8px); 
}

.card img {
  width: 100%;
  aspect-ratio: 1 / 1; 
  object-fit: cover; 
}

.card-body {
  padding: 0.8rem; 
}

.card-title {
  font-size: 1.2rem; 
  font-weight: 400;
  padding-top: 15px;
}

.badge {
  font-size: 1rem; 
  font-weight: 400;
  background-color: rgb(238, 238, 238);
  color: #000000;
}
 h2 {
  text-align: left; 
  font-size: 2.5rem;
  font-weight: bold;
}

p {
  text-align: left; 
  font-size: 1rem;
  padding-bottom: 5vh;
}

.card-price {
  font-weight: bold; 
  font-size: 1.5rem;
  padding-top: 15px;
}
mark {
  background-color: #ffebc3;
  padding: 0.2rem 0.5rem;
  border-radius: 4px;
}
</style>
