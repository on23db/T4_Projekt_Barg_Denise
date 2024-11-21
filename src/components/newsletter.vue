<template>
  <div class="Newsletter">
    <div class="container-lg">
      <div class="row align-items-center">
        <!-- Überschrift linke Spalte -->
        <div class="col-lg">
          <h1>Immer auf dem neusten Stand!</h1>
          <p>Newsletter abonnieren und als Erstes von neuen Spielen, exklusiven Angeboten und spannenden Events erfahren. <strong>Bleibe immer auf dem Laufenden!</strong></p>
        </div>
        <!-- Formular rechte Spalte -->
        <div class="col-lg">
          <div class="container-lg">
            <div class="row">  
              <div class="col">
                <input type="text" class="form-control" placeholder="Vorname" aria-label="Vorname">
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Nachname" aria-label="Nachname">
              </div>
            </div>
            <div class="row" style="gap: 10px;">
              <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="E-Mail" aria-label="E-Mail" aria-describedby="button-addon2">
                  <button class="btn" type="button" id="button-addon2">JETZT ANMELDEN</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>
  
<script>
export default {
  name: 'newsletter',
};
</script>
  
<style scoped>
.Newsletter {
  background-color: #1D4975;
  color: white;
  padding-top: 10vh;
  padding-bottom: 10vh;
}

.input-group {
  display: flex;
  width: 100%;
}

.input-group .form-control,
.input-group .btn,
input.form-control {
  height: 45px;  
}

.input-group .btn {
  background-color: #FF8A00;
  color: white;
  border: none;
  border-radius: 4px;
  padding: 10px 20px;
}

.row {
  margin-bottom: 15px;
}

h1 {
  font-size: 2.5rem;
  margin-bottom: 1rem;
  font-weight: bold;
}

</style>
