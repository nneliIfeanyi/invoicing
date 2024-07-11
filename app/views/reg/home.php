<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstraps.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css" />

  <link rel="manifest" href="<?= URLROOT;?>/site.webmanifest">

  <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT;?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT;?>/favicon-16x16.png">
  
  <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT;?>/apple-touch-icon.png">
  <meta name="apple-mobile-web-app-status-bar" content="#198754">
  <meta name="theme-color" content="#198754">
  <title><?php echo SITENAME;?></title>
  <style type="text/css">
    #loader {
      min-height: 100%;
      z-index: 99999;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-dark mb-3 navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="<?= URLROOT;?>/reg/home/<?php echo $data['ref'];?>">Invoice<span class="text-primary">Online</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT;?>/reg/home/<?php echo $data['ref'];?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/reg/about/<?php echo $data['ref'];?>">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/reg/<?php echo $data['ref'];?>">Register</a>
        </li>
      </ul>
     <span class="nav-item">
            <span class="fa-stack">
              <a href="https://facebook.com" target="_blank">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x text-white"></i>
              </a>
            </span>
            <span class="fa-stack">
              <a href="https://wa.me/2349168655298" target="_blank">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-whatsapp fa-stack-1x text-white"></i>
              </a>
            </span>
          </span>
    </div>
  </div>
</nav>
  <!-- PAGE LOADER -->
  <div id="loader" class="overflow-hidden align-items-middle position-fixed top-0 left-0 w-100 h-100">
    <div class="loader-container position-relative d-flex align-items-center justify-content-center flex-column vw-100 vh-100 text-center" style="background: rgba(0, 0, 0, 0.7);z-index: 500;">
      <span class="spinner-border text-primary"> </span>
    </div>
  </div>
 <!-- Header -->
    <header class="header position-relative">
      <img
        src="images/vertical-decoration-left.svg"
        alt=""
        class="vertical-decoration position-absolute d-none d-md-block"
      />
      <div class="container">
        <div class="row">
          <div class="col-md-6 pt-5">
            <h1 class="xl-text mt-5">
              Software Solution For
              <span class="text-primary fw-bold replace-me"
                >Small, Business, And, Startups</span
              >
            </h1>
            <p class="lead mt-5">
              Give your business a professional brand impression with our invoicing software
            </p>
            <a href="<?= URLROOT;?>/reg/<?php echo $data['ref'];?>" class="btn btn-primary text-white">Get Started</a>
            <a href="<?= URLROOT;?>/reg/about/<?php echo $data['ref'];?>" class="btn btn-outline-primary text-white">Learn More</a>
          </div>
        </div>
      </div>
    </header>

<script src="<?php echo URLROOT; ?>/js/jquery.js"></script> 
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= URLROOT ;?>/js/replaceme.min.js"></script>
<script src="<?= URLROOT ;?>/js/script.js"></script>

 </body>
</html>
<script>
  $(document).ready(function(){
    $('#loader').fadeOut();
  });
</script>

<script>
  $(document).ready(function(){
    $('a').each(function(){
      $(this).click(function(){
         $('#loader').fadeIn();
      });
    });
  });
</script>