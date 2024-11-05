<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="d-flex justify-content-center">
                    <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-youtube"></i></a>
                </div>
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
        height: 6vh; 
        margin-bottom: 0px;
        font-size: 0.9rem;
    }

    i {
        color: white;
    }

    .container-fluid {
        background-color: #002B53;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 20vh; 
        margin-bottom: 0px;
        font-size: 0.9rem;
    }

  </style>
  