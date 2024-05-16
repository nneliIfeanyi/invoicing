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
  <title><?php echo (!empty($_SESSION['user_name'])) ? $_SESSION['user_name'].' '.'Sales Invoice': 'Invoice Online'; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
      <div class="container">
          <!-- <img src="<?php echo URLROOT;?>/logo/branding.png" alt="" height="30" width="100" /> -->
          <a class="navbar-brand" href="<?= URLROOT;?>/pages/index">Invoice<span class="text-primary">Online</span></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo URLROOT?>/posts">Home</a>
            </li>
          
           <!--  <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT;?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT;?>/users/login">Login</a>
            </li> -->
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

        <h1 id="points" class="pt-6">Introducing Points</h1>
        <p class="lead">
          <strong>Points:</strong> is refered to as the only currency language understood by invoiceOnline software. Just like your physical "Coins or Notes" as a purchasing power, so is "Points" our platform specific currency. Therefore without coins in your "virtual wallet" you may not be able to do the following...
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
        <h2 class="fw-bold pt-6" id="fund">Wallet Funding</h2>
        <hr class="hr-heading" />
        <p class="lead">
          Due to our commitment in keeping our services affordable and user friendly we have decided to keep our pricing to the minimum. Find below the breakdown of our pricing list.
        </p>
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <th>Price</th>
              <th>Value</th>
              <th>Action</th>
            </thead>
            <tbody>
              <tr>
                <td>N200</td>
                <td>P25</td>
                <td><a class="btn btn-outline-primary btn-sm" href="https://wa.me/2349168655298?text=I%20need%2025points"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy Now</a></td>
              </tr>
              <tr>
                <td>N500</td>
                <td>P100</td>
                <td><a class="btn btn-outline-primary btn-sm" href="https://wa.me/2349168655298?text=I%20need%20100points"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy Now</a></td>
              </tr>
              <tr>
                <td>N1000</td>
                <td>P210</td>
                <td><a class="btn btn-outline-primary btn-sm" href="https://wa.me/2349168655298?text=I%20need%20210points"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy Now</a></td>
              </tr>
              <tr>
                <td>N2500</td>
                <td>P525</td>
                <td><a class="btn btn-outline-primary btn-sm" href="https://wa.me/2349168655298?text=I%20need%20525points"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy Now</a></td>
              </tr>
              
              <tr>
                <td>N5000</td>
                <td>P1050</td>
                <td><a class="btn btn-outline-primary btn-sm" href="https://wa.me/2349168655298?text=I%20need%201050points"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy Now</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
 
     <!--  <h2 class="fw-bold pt-6" id="fund">Trusted Agents</h2>
      <p class="lead">
        These are verified agents who form part of the invoiceOnline team. They have been committed with the responsibility of distributing POINTS in exchange for money.
      </p>
     <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card bg-secondary">
                <img src="images/project-1.jpg" alt="" class="card-img-top">
                <div class="card-body">
                  <p>
                    <strong class="text-muted">Name:</strong> <span class="text-primary"> NNELI IFEANYI VICTOR</span><br>
                    <strong class="text-muted">Position:</strong> <span class="text-muted"> VENDOR</span><br>
                    <strong class="text-muted">Office:</strong> <span class="fw-semibold"> N200</span><br>
                  </p>
                  <a class="btn btn-success" href="https://wa.me/2349168655298?text=I%20need%20150points"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy P150 for N200</a>
                </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card bg-secondary">
                <img src="images/project-1.jpg" alt="" class="card-img-top">
                <div class="card-body">
                  <p>
                    <strong class="text-muted">Name:</strong> <span class="text-primary"> NNELI IFEANYI VICTOR</span><br>
                    <strong class="text-muted">Position:</strong> <span class="text-muted"> VENDOR</span><br>
                    <strong class="text-muted">Office:</strong> <span class="fw-semibold"> N500</span><br>
                  </p>
                  <a class="btn btn-success" href="https://wa.me/2349168655298?text=I%20need%20375points"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy P375 for N500</a>
                </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card bg-secondary">
                <img src="images/project-1.jpg" alt="" class="card-img-top">
                <div class="card-body">
                  <p>
                    <strong class="text-muted">Name:</strong> <span class="text-primary"> NNELI IFEANYI VICTOR</span><br>
                    <strong class="text-muted">Position:</strong> <span class="text-muted"> VENDOR</span><br>
                    <strong class="text-muted">Office:</strong> <span class="fw-semibold"> N1000</span><br>
                  </p>
                  <a class="btn btn-success" href="https://wa.me/2349168655298?text=I%20need%20900points"><i class="fab fa-whatsapp" aria-hidden="true"></i> Buy P900 for N1000</a>
                </div>
            </div>
          </div>
        </div> -->
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

    <script src="<?php echo URLROOT;?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT;?>/js/script.js"></script>
  </body>
</html>