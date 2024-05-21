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
    <section>
      <div class="container">
        <h1 class="pt-4">Usage Tips</h1>
        <p class="lead">
          Welcome to <?= SITENAME;?>, a simple easy to use online invoicing software owned and operated by Stanvic Concepts. Find below a few sample of guidlines for using the platform.
        </p>
        <div class="row">
         <div class="col-md-6">
            <h2 class="fw-bold">Definitions</h2>
            <hr class="hr-heading" />
            
            <ul class="list-unstyled lh-lg">
              <li class="d-flex align-items-center">
                <i class="fas fa-check text-primary mx-3"></i>
                <div>
                  <strong>User or You: </strong> refers to anyone legally accessing or using invoiceOnline.
                </div>
              </li>
              <li class="d-flex align-items-center">
                <i class="fas fa-check text-primary mx-3"></i>
                <div>
                  <strong>User Data:</strong> refers to the information you provided about your business during registration.
                </div>
              </li>
              <li class="d-flex align-items-center">
                <i class="fas fa-check text-primary mx-3"></i>
                <div>
                  <strong>Client:</strong> refers to anyone privileged to transact or do business wiyh you.
                </div>
              </li>
              <li class="d-flex align-items-center">
                <i class="fas fa-check text-primary mx-3"></i>
                <div>
                  <strong>Client Data:</strong> refers to the information of the client or customer provided while recording or documenting the transaction.
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <h2 class="fw-bold">User Account</h2>
            <hr class="hr-heading" />
            
            <ul class="list-unstyled lh-lg">
              <li class="d-flex align-items-center">
                <i class="fas fa-check text-primary mx-3"></i>
                <div>
                  <strong>You:</strong> must be at least 18years old to create and own an account with us.
                </div>
              </li>
              <li class="d-flex align-items-center">
                <i class="fas fa-check text-primary mx-3"></i>
                <div>
                  <strong>You:</strong> are responsible for maintaining the security of your account and password.
                </div>
              </li>
            </ul>
          </div>
        </div><hr>

        <h1 id="points" class="pt-4">Introducing Points</h1>
        <p class="lead">
          <strong>Points:</strong> is refered to as our platform specific currency which is used/required in performing certain task such as generating/downloading documment, editing a transaction and business logo upload. Without POINTS in your "VIRTUAL WALLET" you may not be able to do the following...
        </p>
        <div class="row">
        <div class="col-md-9 mx-auto">
        <h2 class="fw-bold pt-6">The Use Of Points</h2>
        <hr class="hr-heading" />
            
        <ul class="list-unstyled lh-lg">
          <li class="d-flex align-items-center">
            <i class="fas fa-check text-primary mx-3"></i>
            <div>
              <strong>Recording A Transaction: </strong> There is no charge attached in adding or recording of transaction, its absolutely free.
            </div>
          </li><hr>
          <li class="d-flex align-items-center">
            <i class="fas fa-check text-primary mx-3"></i>
            <div>
              <strong>Editing A Recorded Transaction:</strong> For each successfull edit or update on a recorded transaction, 3POINTS will be deducted from your points balance.
            </div>
          </li><hr>
          <li class="d-flex align-items-center">
            <i class="fas fa-check text-primary mx-3"></i>
            <div>
              <strong>Business Logo Upload:</strong> This attracts a deduction of 300POINTS, for any successfull upload or update of a business logo.
            </div>
          </li><hr>
          <li class="d-flex align-items-center">
            <i class="fas fa-check text-primary mx-3"></i>
            <div>
              <strong>Document Download or Share:</strong> Whenever you download or share an invoice the system automatically minus 5POINTS from your balance.
            </div>
          </li><hr>
        </ul>
      </div>

      <div class="col-md-9 mx-auto">
        <h2 class="fw-bold pt-4" id="fund">Wallet Funding</h2>
        <hr class="hr-heading" />
        <p class="lead">
          Due to our commitment in keeping our services affordable and user friendly we have decided to keep our pricing to the minimum. Find below the breakdown of our pricing list.
        </p>
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <th>Price</th>
              <th>Value</th>
            </thead>
            <tbody>
              <tr>
                <td>N200</td>
                <td>P25</td>
              </tr>
              <tr>
                <td>N500</td>
                <td>P100</td>
                
              </tr>
              <tr>
                <td>N1000</td>
                <td>P210</td>
                
              </tr>
              <tr>
                <td>N2500</td>
                <td>P525</td>
              </tr>
              
              <tr>
                <td>N5000</td>
                <td>P1050</td>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
      <div class="my-5"></div>
    </div>
  </div>
</section>
<section>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="copyright">
                  <p>Copyright © <?php echo date("Y");?> Stanvic Concepts. All rights reserved.</a>.</p>
              </div>
          </div>
      </div>
  </div>
</section>

 <script src="<?php echo URLROOT; ?>/js/jquery.js"></script> 
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>

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