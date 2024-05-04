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
  <title><?php echo (!empty($_SESSION['user_name'])) ? $_SESSION['user_name'].' '.'Sales Invoice': 'Invoice Online'; ?></title>
  <style type="text/css">
    #loader {
      min-height: 100%;
      z-index: 99999;
    }

    .flash-msg1{
      position: fixed;
      top: 9vh;
      right: 0;
      width: auto;
      z-index: 500;
    }
    .flash-msg{
      position: fixed;
      top: 9vh;
      right: 0;
      width: auto;
      z-index: 500;
      animation-name: fade;
      animation-duration: 3s;
      animation-delay: 6s;
      animation-iteration-count: 1;
      animation-fill-mode: forwards;
    }

    @keyframes fade{
      from{opacity: 1;}
      to{opacity: 0;}
    }

    .form-input{
      border: none;
      background: inherit;
      border-bottom: 1px solid grey;
      margin-bottom: 5px;
      width: 96%;
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
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <!-- PAGE LOADER -->
  <div id="loader" class="overflow-hidden align-items-middle position-fixed top-0 left-0 w-100 h-100">
    <div class="loader-container position-relative d-flex align-items-center justify-content-center flex-column vw-100 vh-100 text-center" style="background: rgba(25, 135, 84, 0.7);">
      <span class="spinner-border"> </span>
    </div>
  </div>
  <div class="container">
    