<template>
    <div class="container-lg">
      <Breadcrumbs />
      <h1>Willkommen auf deinem Dashboard</h1>
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Mein Account</h5>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <h5>Übersicht</h5>
          </div>
        </div>
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
  
  <style scoped>
  .row {
    margin-top: 3vh;
    margin-bottom: 5vh;
  }
  
  </style>