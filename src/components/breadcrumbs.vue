<template>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><router-link class="nav-link" to="/">Startseite</router-link></li>
    <li class="breadcrumb-item active" aria-current="page"><router-link class="nav-link" to="/dashboard">Mein Account</router-link></li>
  </ol>

</template>

<script>
export default {
  name: 'Breadcrumbs',
};
</script>

<style scoped>
.breadcrumb {
  margin-top: 2rem;
}
.breadcrumb-item {
  display: inline-block;
  margin-right: 0.5rem;
}
.breadcrumb-item.active {
  text-decoration: underline;
}
</style>