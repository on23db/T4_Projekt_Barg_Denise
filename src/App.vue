<template>
  
    <navigation />
    <div class="container">
    <div class="row mt-4">
      <div class="col-12">
        <products />
      </div>
    </div>
  </div>
</template>

<script>
import navigation from './components/navigation.vue';
import products from './components/products.vue';

export default {
  name: 'App',
  components: {
    navigation,
    products,
  },
};
</script>

<style>
@import 'bootstrap/dist/css/bootstrap.min.css';
@import 'bootstrap-icons/font/bootstrap-icons.css';
</style>
