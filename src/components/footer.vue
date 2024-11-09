<template>
  <div class="footer-content">
    <div class="container-lg">
    <div class="row">
      <div class="col-12 col-md-3">
        <h5>HCM Kinzel</h5>
        <p>Entdecke <strong>Spiele</strong>, die Generationen verbinden, <strong>Wissen</strong> erweitern und Freude <strong>schenken</strong>.</p>
        <div class="social-icons d-flex justify-content-center justify-content-md-start">
          <a href="https://www.youtube.com/user/HCMKinzel"><i class="bi bi-youtube"></i></a>
          <a href="https://www.instagram.com/hcm_kinzel/"><i class="bi bi-instagram"></i></a>
          <a href="https://www.facebook.com/HCMKinzelGmbH/"><i class="bi bi-facebook"></i></a>
          <a href="https://x.com/i/flow/login?redirect_after_login=%2Fhcm_kinzel"><i class="bi bi-twitter-x"></i></a>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <h5>Shop Service</h5>
        <ul class="footer-links">
          <li><a href="#">Händler-Login</a></li>
          <li><a href="#">Defektes Produkt</a></li>
          <li><a href="#">Kontakt</a></li>
        </ul>
      </div>
      <div class="col-12 col-md-3">
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
  </div>
  <div class="container-fluid">
      <p>&copy; 2024 HCM Kinzel GmbH</p>
  </div>
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
  padding-top: 6vh;
  padding-bottom: 6vh;
}


.container-fluid {
  background-color: #001930;
  color: white;
  text-align: center;
  padding: 1vh;
  font-size: 0.9rem;
}

.social-icons i {
  color: white;
  background-color: #FF8A00;
  padding: 8px;
  margin-bottom: 20px;
  border-radius: 4px;
  margin-right: 10px;
  font-size: 1.5rem;
  }

.social-icons i:hover {
  text-decoration: none;
  color: white;
  background-color: #FAB600;
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

.col-md-3 {
  margin-bottom: 40px;
}

.col-md-3 h5 {
  font-size: 1.4rem;
  font-weight: bold;
  margin-bottom: 10px;
}
</style>
