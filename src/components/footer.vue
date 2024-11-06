<template>
    <div class="container-fluid">
      <div class="row text-center text-md-start">
        <div class="col-12 col-md-3 mb-4 mb-md-0">
          <h5>HCM Kinzel</h5>
          <p>Entdecke <strong>Spiele</strong>, die Generationen verbinden, <strong>Wissen</strong> erweitern und Freude <strong>schenken</strong>.</p>
          <div class="d-flex justify-content-center justify-content-md-start">
            <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="me-3"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
        <div class="col-12 col-md-3 mb-4 mb-md-0">
          <h5>Shop Service</h5>
          <ul>
            <li><a href="#" class="me-3">Händler-Login</a></li>
            <li><a href="#" class="me-3">Defektes Produkt</a></li>
            <li><a href="#" class="me-3">Kontakt</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3 mb-4 mb-md-0">
          <h5>Informationen</h5>
          <ul>
            <li><a href="#" class="me-3">Batterieentsorgung</a></li>
            <li><a href="#" class="me-3">Widerrufsrecht</a></li>
            <li><a href="#" class="me-3">Versand- und Zahlungsbedingungen</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-3">
          <h5>Rechtliche Hinweise</h5>
          <ul>
            <li><a href="#" class="me-3">Impressum</a></li>
            <li><a href="#" class="me-3">AGB</a></li>
            <li><a href="#" class="me-3">Datenschutzerklärung</a></li>
          </ul>
        </div>
      </div>
    </div>
    <footer>
      <p>&copy; 2024 HCM Kinzel GmbH</p>
    </footer>
  </template>
  
  <script>
  export default {
    name: 'Footer',
  };
  </script>
  
  <style scoped>
  footer {
    background-color: #001930;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    min-width: fit-content;
    margin-bottom: 0px;
    font-size: 0.9rem;
  }
  
  i {
    color: white;
    background-color: #FF8A00;
    padding: 5px;
  }
  
  .container-fluid {
    background-color: #002B53;
    color: white;
    height: auto;
    margin-bottom: 0px;
    font-size: 0.9rem;
  }
  
  li {
    list-style-type: none;
  }
  
  a {
    color: white;
    text-decoration: none;
  }
  
  /* Anpassungen für mobile Geräte */
  @media (max-width: 768px) {
    footer p {
      font-size: 0.8rem;
    }
    .container-fluid {
      height: auto; /* Höhe der Fußzeile anpassen */
    }
    .row {
      text-align: center; /* Alle Inhalte auf kleinen Bildschirmen zentrieren */
    }
    .col-12 {
      padding-left: 0;
      padding-right: 0;
    }
    .col-md-3 {
      margin-bottom: 20px; /* Mehr Abstand für kleinere Bildschirme */
    }
  }
  </style>
  