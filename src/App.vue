<template>
  <div id="app">
    <Infobar />
    <Navbar />

    <!-- Hier ändern sich die Komponenten -->
    <router-view></router-view>

    <Footer />
  </div>
</template>

<script>
import Infobar from './components/infobar.vue';
import Navbar from './components/Navbar.vue';
import Footer from './components/footer.vue';

export default {
  name: 'App',
  components: {
    Infobar,
    Navbar,
    Footer,
  },
};
</script>