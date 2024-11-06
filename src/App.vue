<template>
  <infobar />
    <navigation />
    <carousel />
    <div class="container">
    <div class="row mt-4">
      <div class="col-12">
        <products />
      </div>
    </div>
  </div>
  <Footer />
</template>

<script>
import Infobar from './components/infobar.vue';
import navigation from './components/navigation.vue';
import carousel from './components/carousel.vue';
import products from './components/products.vue';
import Footer from './components/footer.vue';

export default {
  name: 'App',
  components: {
    Infobar,
    navigation,
    carousel,
    products,
    Footer,
  },
};
</script>

<style>
@import 'bootstrap/dist/css/bootstrap.min.css';
@import 'bootstrap-icons/font/bootstrap-icons.css';

</style>
