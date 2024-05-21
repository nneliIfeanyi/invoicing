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
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" />

  <link rel="manifest" href="<?= URLROOT;?>/site.webmanifest">

  <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT;?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT;?>/favicon-16x16.png">
  
  <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT;?>/apple-touch-icon.png">
  <meta name="apple-mobile-web-app-status-bar" content="#198754">
  <meta name="theme-color" content="#198754">
  <title><?php echo SITENAME?></title>
  <style type="text/css">
    #loader {
      min-height: 100%;
      z-index: 99999;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {    
    border-color:#D43F3A;
    box-shadow: none;
    }

    input.parsley-error:focus,
    select.parsley-error:focus,
    textarea.parsley-error:focus {    
        border-color:#D43F3A;
        box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #FF8F8A;
    }

    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {    
        border-color:#398439;
        box-shadow: none;
    }

    input.parsley-success:focus,
    select.parsley-success:focus,
    textarea.parsley-success:focus {    
        border-color:#398439;
        box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #89D489
    }

    .parsley-errors-list {
        list-style-type: none;
        padding-left: 0;
        margin-top: 5px;
        margin-bottom: 0;
    }

    .parsley-errors-list.filled {
        color: #D43F3A;
        opacity: 1;
    }
    </style>
</head>
<body style="position: relative;">


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
<div class="container">
 
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light my-5">
      <div class="shadow-lg p-4 rounded-4 border text-bg-success mb-3" style="margin-top: -50px;">
        <h1 class="h4 m-0">Simple And Easy To Use Online Invoicing Software For Business Owners.</h1>
      </div>
      <p class="text-primary fw-semibold">Create An Account</p>
      <p>Please fill this form to register with us</p>
      <form action="<?= URLROOT;?>/reg/register/<?= $data['ref'];?>"  method="post" id="register_form">
        <div class="form-group mb-3">
            <label>Business Name:</label>
            <input type="text" name="name" id="business-name" data-parsley-length="[0, 30]" required data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['name']; ?>">
        </div> 
        <div class="form-group mb-3">
            <label>Business Description:</label>
            <input type="text" name="biz_dsc" data-parsley-length="[0, 35]" required data-parsley-trigger="keyup" class="form-control form-control-lg <?php echo (!empty($data['biz_dsc_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['biz_dsc']; ?>">
            <span class="invalid-feedback"><?php echo $data['biz_dsc_err']; ?></span>
        </div> 
        <div class="form-group mb-3">
            <label>Hotline:</label>
            <input type="number" name="phone" required data-parsley-trigger="keyup" data-parsley-length="[10, 11]" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
            <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
        </div> 
        <div class="form-group mb-3">
            <label>Business Address:</label>
            <input type="text" name="address" class="form-control form-control-lg" data-parsley-length="[0, 40]" data-parsley-trigger="keyup" value="<?php echo $data['address']; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Business category:</label>
            <select class="form-control" name="category" required data-parsley-trigger="keyup">
                <option value="">
                    ---
                </option>
                <option value="B&S">
                    Production
                </option>
                <option value="B&S">
                    Trading
                </option>
                <option value="services">
                    Service rendering
                </option>
                <option value="services">
                    Freelancing
                </option>
            </select>
        </div>  
        <div class="form-group mb-3">
            <label>Email:</label>
            <input type="email" name="email" required data-parsley-trigger="keyup" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>    
        <div class="form-group mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group mb-3">
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="row">
          <div class="col-md-6">
            <input type="submit" class="btn btn-success btn-block mb-3" value="Register">
          </div>
          <!-- <div class="col-md-6">
              <a href="<?php echo URLROOT;?>/users/login" class="text-dark text-muted fs-6">Have an account? Login</a>
          </div> -->
          <div class="col">
           <p class="text-muted pt-3" style="font-size:12px;"> <i class="fa fa-info-circle"></i> You will be redirected to the login page once your registration is completed.</p>
          </div>
        </div>
      </form>
    </div>
  </div>
 <script src="<?php echo URLROOT; ?>/js/jquery.js"></script> 
 <script src="<?= URLROOT ;?>/js/parsley.min.js"></script>
<script src="<?= URLROOT ;?>/js/replaceme.min.js"></script>
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
<script type="text/javascript">
    $('#register_form').parsley();
    $('#loader').fadeIn();
</script>
