<template>
  <div class="placeholder-container">
    <h1>Das ist eine Platzhalter-Seite</h1>
    <p>Hier gibt's bald was zu sehen!</p>
    <p class="small">Das ist gelogen.</p>
    <img src="/src/assets/Background_orange.svg" alt="Orangener Hintergrund" class="img-fluid">
  </div>
</template>

<script>
export default {
  name: 'Placeholder',
};
</script>

<style scoped>
h1 {
  text-align: center;
  margin-top: 10%;
  font-size: 3em;
  color: #FFA500;
}

p {
  text-align: center;
  font-size: 1.2em;
  color: #1b1b1b;
  margin-top: 20px;
}

.small {
  font-size: 0.5em;
  color: #1b1b1b;
  font-style: italic;
  margin-top: auto;
}

img {
  bottom: 0;
  left: 0;
  width: 100%;
}
</style>
