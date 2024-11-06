<template>
  <div class="footer-content">
    <div class="row">
      <div class="col-12 col-md-3 mb-4 mb-md-0">
        <h5>HCM Kinzel</h5>
        <p>Entdecke <strong>Spiele</strong>, die Generationen verbinden, <strong>Wissen</strong> erweitern und Freude <strong>schenken</strong>.</p>
        <div class="social-icons d-flex justify-content-center justify-content-md-start">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-twitter"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
      <div class="col-12 col-md-3 mb-4 mb-md-0">
        <h5>Shop Service</h5>
        <ul class="footer-links">
          <li><a href="#">Händler-Login</a></li>
          <li><a href="#">Defektes Produkt</a></li>
          <li><a href="#">Kontakt</a></li>
        </ul>
      </div>
      <div class="col-12 col-md-3 mb-4 mb-md-0">
        <h5>Informationen</h5>
        <ul class="footer-links">
          <li><a href="#">Batterieentsorgung</a></li>
          <li><a href="#">Widerrufsrecht</a></li>
          <li><a href="#">Versand- und Zahlungsbedingungen</a></li>
        </ul>
      </div>
      <div class="col-12 col-md-3">
        <h5>Rechtliche Hinweise</h5>
        <ul class="footer-links">
          <li><a href="#">Impressum</a></li>
          <li><a href="#">AGB</a></li>
          <li><a href="#">Datenschutzerklärung</a></li>
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
.footer-content {
  background-color: #002B53;
  color: white;
  padding: 20px;
}

footer {
  background-color: #001930;
  color: white;
  text-align: center;
  padding: 10px;
  font-size: 0.9rem;
}

.social-icons a {
  color: white;
  background-color: #FF8A00;
  padding: 5px;
  border-radius: 4px;
  margin-right: 10px;
  display: inline-block;
}

.social-icons a:last-child {
  margin-right: 0;
}

.footer-links {
  padding: 0;
  margin: 0;
  list-style-type: none;
}

.footer-links li {
  margin-bottom: 10px;
}

.footer-links li a {
  color: white;
  text-decoration: none;
}

.footer-links li a:hover {
  text-decoration: underline;
}

/* Anpassungen für mobile Geräte */
@media (max-width: 768px) {
  .footer-content .row {
    text-align: center;
  }
  .footer-content .col-12 {
    padding: 0;
  }
  .footer-content .col-md-3 {
    margin-bottom: 20px;
  }
}
</style>
