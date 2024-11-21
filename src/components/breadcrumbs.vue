<template>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <router-link class="nav-link" to="/">Startseite</router-link>
    </li>
    <li class="breadcrumb-item" v-if="$route.path !== '/dashboard'">
      <router-link class="nav-link" to="/dashboard">Mein Account</router-link>
    </li>
    <li class="breadcrumb-item active" aria-current="page" v-else>
      Mein Account
    </li>
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

.breadcrumb-item.active {
  text-decoration: underline;
}
</style>
