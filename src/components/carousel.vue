<template>
  <div id="carousel" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/src/assets/NSP.png" class="d-block w-100" alt="Vorstellung der Spieleneuheit Next Station London">
        <div class="overlay"></div> <!-- Shadow Overlay -->
        <div class="carousel-caption">
          <h5>Next Station: Paris!</h5>
          <p>Von London bis nach Tokyo - unsere Weltreise geht weiter nach Paris! Strategisch Planen, clever Punkten - nur die geschicktesten Stadtplaner können gewinnen.</p>
          <a class="btn" href="#" role="button">JETZT KAUFEN</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/src/assets/PuzzLegend.png" class="d-block w-100" alt="Vorstellung der Spielereihe PuzzLegend">
        <div class="overlay"></div> <!-- Shadow Overlay -->
        <div class="carousel-caption">
          <h5>PuzzLegend: Kannst du die Rätsel lösen?</h5>
          <p>Erlebe spannende Geschichten und löse knifflige Rätsel. Ob Sherlock Holmes, Merlin oder Robinson – jede Karte bringt dich der Lösung näher. Bist du bereit für die Herausforderung?</p>
          <a class="btn" href="#" role="button">JETZT KAUFEN</a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</template>

<script>
export default {
  name: 'carousel',
};
</script>

<style scoped>
.carousel-item {
  position: relative;
}

.overlay {
  position: absolute;
  top: 0;
  right: 0;
  width: 170vb;
  height: 100%;
  background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);
}

.carousel-caption {
  position: absolute;
  top: 50%;
  right: 10%; 
  left: 60%;
  transform: translateY(-50%);
  color: white;
  padding: 20px;
  text-align: left;
  max-width: fit-content;
  min-height: fit-content;
}

.carousel-caption h5 {
  font-size: 2.5em;
  font-weight: 800;
}

.carousel-caption p {
  font-size: 1em;
}

a.btn {
  background-color: #FF8A00;
  border: none;
  color: #ffffff;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 10px;
  cursor: pointer;
  font-weight: 500;
}

a.btn:hover {
  background-color: #FAB600;
  color: #ffffff;
}
</style>
