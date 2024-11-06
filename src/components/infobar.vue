<template>
  <p class="information text-center p-2">Spiel Essen 2024 – Wir sind dabei an Stand DB137! Jetzt Termine mit uns buchen!</p>     
</template>

<script>
export default {
name: 'infobar',
};
</script>

<style scoped>
.information {
background-color: #F09118; 
color: white;
display: flex;
justify-content: center;
align-items: center;
height: 6vh; 
margin-bottom: 0px;
font-size: 0.9rem;
}

@media (max-width: 576px) {
.information {
  font-size: 0.75rem; 
  height: auto;       
  padding: 10px;      
}
}
</style>
