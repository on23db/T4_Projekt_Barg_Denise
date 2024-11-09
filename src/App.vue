<template>
  <div id="app">
    <Navbar />

    <!-- Hier ändern sich die Komponenten -->
    <router-view></router-view>

    <newsletter />
    <Footer />
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
import Footer from './components/footer.vue';
import newsletter from './components/newsletter.vue';

export default {
  name: 'App',
  components: {
    Navbar,
    Footer,
    newsletter,
  },
};
</script>