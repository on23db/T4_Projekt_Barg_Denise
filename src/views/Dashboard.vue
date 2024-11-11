<template>
    <div class="container-lg">
      <h1>Dashboard</h1>
      <Breadcrumbs />
    </div>
  </template>
  
  <script>
import Breadcrumbs from '@/components/breadcrumbs.vue';

  export default {
    name: 'Dashboard',
    components: {
      Breadcrumbs,
    },
  };
  </script>
  